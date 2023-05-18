<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class HomeController extends Controller {
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('home');

        return view('home');
    }
}