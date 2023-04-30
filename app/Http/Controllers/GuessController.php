<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class GuessController extends Controller
{
    public function show() {
        return view('guess');
    }

    public function submit(Request $request){
        $feedback = new Feedback();
        
        $feedback->name = $request->input('i');
        // $request->validated();
        
        // return redirect()->route('guess')->with('success', 'Ваш тест отправлен.');
    }
}
