<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    
    public function show(){
        return view('admin-register');
    }

    public function submit(Request $request) {
        $user = User::create([
            'name' => $request->surname .  $request->name . $request->patronymic,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->route('admin');
    }
}
