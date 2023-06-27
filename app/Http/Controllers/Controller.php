<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        App::setLocale('ru');
        Statistic::create([
            'host_name' =>  gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'browser_name' => $_SERVER['HTTP_USER_AGENT'],
            'page' => Route::current()->uri(),
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);
    }
}
