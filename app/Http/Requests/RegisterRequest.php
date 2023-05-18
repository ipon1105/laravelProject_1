<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => $this->get('email'),
            'password' => $this->get('password'),
            'name' => $this->get('name'),
            'surname' => $this->get('surname'),
            'patronymic' => $this->get('patronymic'),
            'is_admin' => true,
        ];
    }
}
