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
        $request->validated();
        $user = User::create($request->getCredentials());

        auth()->login($user);

        return redirect()->route('admin');
    }
}
