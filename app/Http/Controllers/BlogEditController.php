<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogEditRequest;

class BlogEditController extends Controller
{
    public function show() {
        return view('bedit');
    }

    public function submit(BlogEditRequest $request){
        $request->validated();

        // $feedback = new Feedback();
        // $feedback->name = $request->input('name');
        // $feedback->surname = $request->input('surname');
        // $feedback->patronymic = $request->input('patronymic');
        // $feedback->email = $request->input('email');
        // $feedback->msg = $request->input('msg');
        // $feedback->save();
        
        return redirect()->route('blog-edit')->with('success', 'Запись отправлена');
    }
}
