<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Auth;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    
    public function show(){
        return view('user-login');
    }

    public function submit(UserLoginRequest $request) {
        $credentials = $request->getCredentials();
        
        if (!Auth::attempt($credentials))
            return redirect()->route('user-login')->withErrors(['email' => 'Не верный логин или пароль.']);
        
        return redirect()->route('test');
    }
}
