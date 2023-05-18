<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogEditRequest;
use App\Models\Note;
use App\Models\Statistic;
use Illuminate\Http\Request;

class BlogEditController extends Controller
{
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('blogedit');

        return view('bedit');
    }

    public function submit(BlogEditRequest $request){
        $request->validated();

        // Данные записи
        $header = $request->input('header');
        $content = $request->input('content');
        $path = null;
            
        // Путь до файла если он есть
        if ($request->file('inputFile') != null)
            $path = $request->file('inputFile')->store('uploads', 'public');
            
        $note = new Note();
        $note->header = $header;
        $note->content = $content;
        $note->filename = $path;
        $note->save();

        return redirect()->route('blog-edit')->with('success', 'Запись отправлена');
    }
}
