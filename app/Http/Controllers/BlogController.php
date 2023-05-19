<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Statistic;

class BlogController extends Controller
{
    
    public function show(Request $request){

        $notes = Note::orderBy('created_at')->paginate();
        $sort = $notes->getCollection()->sortBy('created_at')->values();
        $notes->setCollection($sort);
        
        return view('blog', ['notes' => $notes]);
    }

}
