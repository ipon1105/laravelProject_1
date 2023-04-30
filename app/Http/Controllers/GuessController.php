<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Http\Requests\GuessRequest;

class GuessController extends Controller
{
    public function show() {
        return view('guess');
    }

    public function submit(GuessRequest $request){
        $request->validated();

        $feedback = new Feedback();
        
        $feedback->name = $request->input('name');
        $feedback->surname = $request->input('surname');
        $feedback->patronymic = $request->input('patronymic');
        $feedback->email = $request->input('email');
        $feedback->msg = $request->input('msg');

        $feedback->save();
        
        return redirect()->route('guess')->with('success', 'Ваш отзыв отправлен.');
    }

    public function all(){
        $data = new Feedback;
        
        return redirect()->route('guess')->with('feedbacks',  $data->orderBy('created_at', 'desc')->get());
    }
}
