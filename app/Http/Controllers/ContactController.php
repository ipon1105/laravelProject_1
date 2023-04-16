<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller {
    public function show() {
        return view('contact');
    }

    public function submit(Request $request){
        // dd($request->input());
        $validation = $request->validate([
            'fio' => 'required|regex:/[а-яА-Я]{1,}\s[а-яА-ЯёЁ]{1,}\s[а-яА-Я]{1,}/',
            'date' => 'required|regex:/\d+\/\d+\/\d{4}/',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required',
            'email' => 'required|email',
            'age' => 'required',
        ]);
        // echo $validation;
    }
}