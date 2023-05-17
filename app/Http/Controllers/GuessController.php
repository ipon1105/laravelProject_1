<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\GuessRequest;

class GuessController extends Controller
{
    public function show() {
        return view('guess');
    }

    public function submit(GuessRequest $request){
        $request->validated();

        $feedback = date('d.m.y') . ';' . $request->input('name') . ';' . $request->input('surname') . ';' . $request->input('patronymic') . ';' . $request->input('email') . ';' . $request->input('msg') . "\n";
        $filename = "/var/www/laravelProject_1/storage/app/public/messages.inc";

        $feedback .= file_get_contents($filename);
        // dd($feedback);
        file_put_contents($filename, $feedback);

        return redirect()->route('guess')->with('success', 'Ваш отзыв отправлен.');
    }

    public function all(){
        $filename = "/var/www/laravelProject_1/storage/app/public/messages.inc";
        $data = file($filename);

        return redirect()->route('guess')->with('feedbacks',  $data);
    }
}
