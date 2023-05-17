<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\GuessAddRequest;
use App\Http\Requests\GuessLoadRequest;

class GuessController extends Controller
{
    public function show() {
        $filename = "/var/www/laravelProject_1/storage/app/public/messages.inc";
        $data = file($filename);

        return view('guess', ['feedbacks' =>  $data]);
    }

    public function add(GuessAddRequest $request){
        $request->validated();

        $feedback = date('d.m.y') . ';' . $request->input('name') . ';' . $request->input('surname') . ';' . $request->input('patronymic') . ';' . $request->input('email') . ';' . $request->input('msg') . "\n";
        $filename = "/var/www/laravelProject_1/storage/app/public/messages.inc";

        $feedback .= file_get_contents($filename);

        file_put_contents($filename, $feedback);

        return redirect()->route('guess')->with('success', 'Ваш отзыв отправлен.');
    }

    public function load(GuessLoadRequest $request){
        dd($request);
        
        // ?

        return redirect()->route('guess')->with('success', 'Ваш файл загружен.');
    }

}
