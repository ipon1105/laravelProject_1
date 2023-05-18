<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Statistic;

class BlogController extends Controller
{
    
    public function show(Request $request){
        $item = new Statistic;
        $item->save_statistic('blog');

        $index = 1;
        
        $perPage = 10;
        $pages = array();
        
        // Заполняем навигатор
        $key = 1;
        $max = Note::count();
        while(true){
            if ($index == 1) {
                if ($key > $index + 4)
                    break;
            } else if ($index == 2) {
                if ($key > $index + 3)
                    break;
            } else if ($index == Note::count()) {
                if ($key < $index - 4){
                    $key++;
                    continue;
                }
            } else if ($index == Note::count()-1) {
                if ($key < $index - 3){
                    $key++;
                    continue;
                }
            } else {
                if ($key < $index - 2){
                    $key++;
                    continue;
                }
                if ($key > $index + 2){
                    break;
                }
            }
                
            if ($key * $perPage >= $max){
                $pages[$key] = "".(($key-1)*$perPage+1)."-".$max;
                break;
            }
            $pages[$key] = "".(($key-1)*$perPage+1)."-".($key*$perPage);
            $key++;
        }

        $data = Note::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $index);

        return view('blog', [
            'notes' => $data,
            'pages' => $pages,
        ]);
    }

    public function index($index){  
        $perPage = 10;
        $pages = array();
        
        // Заполняем навигатор
        $key = 1;
        $max = Note::count();
        while(true){
            if ($index == 1) {
                if ($key > $index + 4)
                    break;
            } else if ($index == 2) {
                if ($key > $index + 3)
                    break;
            } else if ($index == Note::count()) {
                if ($key < $index - 4){
                    $key++;
                    continue;
                }
            } else if ($index == Note::count()-1) {
                if ($key < $index - 3){
                    $key++;
                    continue;
                }
            } else {
                if ($key < $index - 2){
                    $key++;
                    continue;
                }
                if ($key > $index + 2){
                    break;
                }
            }
                
            if ($key * $perPage >= $max){
                $pages[$key] = "".(($key-1)*$perPage+1)."-".$max;
                break;
            }
            $pages[$key] = "".(($key-1)*$perPage+1)."-".($key*$perPage);
            $key++;
        }

        $data = Note::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $index);

        return view('blog', [
            'notes' => $data,
            'pages' => $pages,
        ]);
    }

    public function submit(Request $request){
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
