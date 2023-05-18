<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;


class AdminLogoutController extends Controller
{
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
