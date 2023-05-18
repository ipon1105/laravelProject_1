<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAddRequest;
use App\Http\Requests\AdminLoadRequest;
use App\Models\Note;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function show(Request $request) {
        if (!Auth::user()->is_admin)
            return redirect()->route('login');

        $item = new Statistic;
        $item->save_statistic('admin');

        return view('admin');
    }

    public function add(AdminAddRequest $request){
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

        return redirect()->route('admin')->with('success', 'Запись отправлена');
    }

    public function load(AdminLoadRequest $request){
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

        return redirect()->route('admin')->with('success', 'Записи загружены');
    }
}