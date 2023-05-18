<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('contact');

        return view('contact');
    }

    public function submit(ContactRequest $request){
        $request->validated();

        return redirect()->route('contact')->with('success', 'Мы свяжемся с Вами');
    }
}