<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    
    public function show(){
        return view('admin-register');
    }

    public function submit(RegisterRequest $request) {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect()->route('admin');
    }
}
