<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    
    public function show(){
        return view('user-registration');
    }

    public function submit(UserRegistrationRequest $request) {
 
        $request->validated();
        $user = User::create($request->getCredentials());

        auth()->login($user);
        
        // return redirect()->route('test');
        return response()->json([
            'status' => 'Успех',
            'message' => 'Вы зарегистрированы',
        ]);
    }
}
