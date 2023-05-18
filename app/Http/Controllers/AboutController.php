<?php

namespace App\Http\Controllers;
use App\Models\Statistic;
use Illuminate\Http\Request;


class AboutController extends Controller {

    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('about');

        return view('about');
    }
}