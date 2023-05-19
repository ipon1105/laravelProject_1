<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\LoadRequest;
use App\Models\Note;
use App\Models\Statistic;
use Auth;
use Illuminate\Http\Request;

class BlogEditController extends Controller
{
    public function show(Request $request) {
        if (!Auth::user()->is_admin)
            return redirect()->route('login');

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


    public function load(LoadRequest $request){
        $file = $request->file('inputFile');

        if ($file !== null) {
            foreach (file($file) as $el) {
                $note = new Note();
                $temp = str_getcsv($el);
                $note->header = $temp[0];
                $note->content = $temp[1];
                $note->created_at = $temp[3];
                $note->updated_at = $temp[3];
                $note->save();
            }
        }
        return redirect()->route('blog')->with('success', 'Записи загружены');
    }
}
