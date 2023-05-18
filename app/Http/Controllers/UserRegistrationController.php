<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    
    public function show(){
        return view('user-registration');
    }

    public function submit(Request $request) {
        return view('user-registration');
        // $user = User::create($request->validated());

        // auth()->login($user);

        // return redirect()->route('admin');
    }
}
