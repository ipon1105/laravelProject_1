<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\GuessAddRequest;
use App\Http\Requests\GuessLoadRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

class GuessController extends Controller
{
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('guess');

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
        $file = $request->file('inputFile');
        $filename = "/var/www/laravelProject_1/storage/app/public/messages.inc";

        if ($file !== null) {
            // Читаем существующие записи в массив
            $arr = explode('\n', file_get_contents($filename));

            // Добавляем к существующим записям новые
            foreach (file($file) as $el) {
                array_push($arr, $el);
            }

            // Сортируем
            sort($arr, SORT_STRING);

            // Записываем содержимое в файл
            file_put_contents($filename, $arr);
        }

        return redirect()->route('guess')->with('success', 'Ваш файл загружен.');
    }

}
