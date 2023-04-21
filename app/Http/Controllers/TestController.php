<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class TestController extends Controller {
    public function show() {
        return view('test');
    }

    public function submit(TestRequest $request){
        $request->validated();

        return redirect()->route('test')->with('success', 'Ваш тест отправлен');
    }
}