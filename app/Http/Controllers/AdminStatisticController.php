<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Statistic;

class AdminStatisticController extends Controller
{
    public function show(){
        if (!Auth::user()->is_admin)
            return redirect()->route('login');
            
        $statistics = Statistic::orderBy('time_statistic')->paginate();
        $sort = $statistics->getCollection()->sortBy('time_statistic')->values();
        $statistics->setCollection($sort);
        return view('statistics', ['statistic' => $statistics]);
    }
}
