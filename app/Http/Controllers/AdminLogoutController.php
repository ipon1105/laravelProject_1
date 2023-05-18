<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;


class AdminLogoutController extends Controller
{
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
