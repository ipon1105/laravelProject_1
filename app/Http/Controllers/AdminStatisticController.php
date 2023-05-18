<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class AdminStatisticController extends Controller
{
    public function show(){
        $statistics = Statistic::orderBy('time_statistic')->paginate();
        $sort = $statistics->getCollection()->sortBy('time_statistic')->values();
        $statistics->setCollection($sort);
        return view('statistics', ['statistic' => $statistics]);
    }
}
