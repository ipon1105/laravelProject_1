<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;

class TestController extends Controller {
    public function show() {
        return view('test');
    }

    public function submit(TestRequest $request){
        $request->validated();
    }
}