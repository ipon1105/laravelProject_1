<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\Statistic;

class TestController extends Controller {
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('test');

        return view('test');
    }

    public function submit(TestRequest $request){
        $request->validated();
        
        $test = new Test();
        $test->fio = $request->input('fio');
        $test->group = $request->input('group');
        $test->is1Correctly = false;
        $test->is2Correctly = false;
        $test->is3Correctly = false;
        
        $i = 0;
        if ($request->input('check') != null){
            if (count($request->input('check')) == 2 &&
                strcmp($request->input('check')[0], 'Левые') == 0 &&
                strcmp($request->input('check')[1], 'Правые') == 0) {$i = $i + 1; $test->is1Correctly = true;}

            $test->question1 = implode('|', $request->input('check'));
        } else {
            $test->question1 = "";
        }

        $test->question2 = $request->input('select');
        if (strcmp($request->input('select'), 'Блочной') == 0) {$i = $i + 1; $test->is2Correctly = true;}

        $test->question3 = $request->input('input_1');
        if (strcmp($request->input('input_1'), 'Треугольной') == 0) {$i = $i + 1; $test->is3Correctly = true;}

        $test->save();

        return redirect()->route('test')->with('success', 'Ваш тест отправлен. Результат: '.$i.'/3');
    }
}