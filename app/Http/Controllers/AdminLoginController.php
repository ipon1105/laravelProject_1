<?php

namespace App\Http\Controllers;

// use Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function show(){
        return view('admin-login');
    }

    public function submit(LoginRequest $request) {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials))
            return redirect()->route('login')->withErrors(['email' => 'Не верный логин или пароль.']);
    

        return redirect()->route('admin');
    }
}
