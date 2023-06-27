<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('created_at', 'desc')->paginate(10);

        return view('history', compact('statistics'));
    }

}
