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
        
        $i = 0;
        
        if ($request->input('check') != null &&
            count($request->input('check')) == 2 &&
            strcmp($request->input('check')[0], 'check_1') == 0 &&
            strcmp($request->input('check')[1], 'check_2') == 0) $i = $i + 1;
        if (strcmp($request->input('select'), 'select_2') == 0) $i = $i + 1;
        if (strcmp($request->input('input_1'), 'Треугольной') == 0) $i = $i + 1;

        return redirect()->route('test')->with('success', 'Ваш тест отправлен. Результат: '.$i.'/3');
    }
}
/*
Рализовать всю проверку с помощью встроенных правил валидации Laravel
