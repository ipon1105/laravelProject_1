<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller {
    public function show() {
        return view('contact');
    }

    public function submit(ContactRequest $request){
        $request->validated();

        return redirect()->route('contact')->with('success', 'Мы свяжемся с Вами');
    }
}