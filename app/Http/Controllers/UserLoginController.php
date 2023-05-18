<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    
    public function show(){
        return view('user-login');
    }

    public function submit(Request $request) {
        return view('user-login');
        // $credentials = $request->getCredentials();
        
        // $email = $request->input('email');
        // $password = $request->input('password');

        // if (!Auth::attempt($credentials))
        //     return redirect()->route('login')->withErrors(['email' => 'Не верный логин или пароль.']);
            

        // if(!Auth::validate($credentials)):
        //     
        // endif;

        // $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Auth::login($user);

        // return redirect()->route('admin');
    }
}
