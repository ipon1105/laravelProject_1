<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller {
    public function show() {
        return view('contact');
    }

    public function submit(Request $request){
        $validation = $request->validate([
            'fio' => 'required|alpha',
            'date' => 'required',
            'tel' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'age' => 'required',
        ]);
        echo $validation;
        dd($request->input());
        
    }
}