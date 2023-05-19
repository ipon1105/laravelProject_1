<?php

namespace App\Http\Requests;

use Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function getCredentials()
    {
        return [
            'email' => $this->input('email'),   
            'password' => Hash::make($this->input('password')),
            'name' => $this->input('name'),
            'surname' => $this->input('surname'),
            'patronymic' => $this->input('patronymic'),
            'is_admin' => false,
        ];
    }
}
