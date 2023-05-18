<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use App\Models\Statistic;

class HobbyController extends Controller {
    public function show(Request $request) {
        $item = new Statistic;
        $item->save_statistic('hobby');

        return view('hobby', ['titleLists' => Interest::TITLELIST, 'textLists' => Interest::TEXTLIST]);
    }
}