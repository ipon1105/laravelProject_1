<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class BlogController extends Controller
{
    
    public function show(){
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

                // Путь до файла если он есть
                if ($temp[4] == null || $temp[4] == "" || $temp[4] == '')
                    $note->filename = null;
                else{
                    $image = file_get_contents($temp[4]);
                    $filename = 'uploads/'.sha1(time()).'.'.pathinfo($temp[4], PATHINFO_EXTENSION);
                    $note->filename = $filename;

                    file_put_contents(storage_path('app/public/'.$filename), $image);

                    // file_put_contents("/var/www/laravelProject_1/storage/app/public/uploads/".sha1(time()).'.png', $image );
                    // ->store('uploads', 'public');
                    // file_put_contents();
                    //  = $request->file($temp[4])->store();
                    // Storage::disk('public')->storeFile
                }

                $note->save();
            }
        }
        // $data = Note::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $index);

        return redirect()->route('blog')->with('success', 'Записи загружены');
    }

}
