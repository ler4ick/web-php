<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HobbyModel;

class HobbyController extends Controller
{
    public  function index() {
        $interestsModel = new HobbyModel();
        $data = $interestsModel->aboutMe();
        $vars = ['names' => $data];

        return view('hobby', $vars);
    }
}
