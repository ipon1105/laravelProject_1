<?php

namespace App\Http\Controllers;

use App\Models\Interest;
// use Illuminate\Http\Request;

class HobbyController extends Controller {
    public function show() {
        return view('hobby', ['titleLists' => Interest::TITLELIST, 'textLists' => Interest::TEXTLIST]);
    }
}