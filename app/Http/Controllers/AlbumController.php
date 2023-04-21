<?php

namespace App\Http\Controllers;

use App\Models\Photo;
// use Illuminate\Http\Request;

class AlbumController extends Controller {
    public function show() {
        return view('album', ['photos' => PHOTO::PHOTO_SET]);
    }
}