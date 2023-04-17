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

        $to      = 'my_world1105@mail.ru';
        $from = 'Test from' . $request->input('fio') . $request->input('group');
        $message =  '1:' . $request->input('check') . '\n' .
                    '2:' . $request->input('select') . '\n' .
                    '3:' . $request->input('input_1') . '\n';
        
        Mail::to($to)->send(new TestMail($message));
        
        return redirect()->route('test')->with('success', 'Ваш тест отправлен');

    }
}