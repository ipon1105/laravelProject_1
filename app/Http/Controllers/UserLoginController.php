<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\Statistic;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Session;
use URL;

class UserLoginController extends Controller
{
    public function show(Request $request){
        // dd($request->session()->previousUrl());
        if (!Session::get('back')){
            Session::put('back', $request->session()->previousUrl());
        }

        return view('user-login');
    }

    public function submit(UserLoginRequest $request) {
        // dd($request->session()->previousUrl());
        // dd(session());
        $credentials = $request->getCredentials();
        
        if (!Auth::attempt($credentials))
            return redirect()->route('user-login')->withErrors(['email' => 'Не верный логин или пароль.']);

        return Redirect::to(Session::get('back'));
    }

}
