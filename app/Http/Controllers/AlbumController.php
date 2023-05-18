<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Statistic;

class AlbumController extends Controller {
    public function show(Request $request) {
        $item = new Statistic();
        $item->save_statistic('album');

        return view('album', ['photos' => PHOTO::PHOTO_SET]);
    }
}