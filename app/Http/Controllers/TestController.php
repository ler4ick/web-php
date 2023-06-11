<?php

namespace App\Http\Controllers;

use App\Models\TestModel;

class TestController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new  TestModel();
    }

    public function index()
    {
        return view('test');
    }

    function checkAction()
    {
        if (!empty($_POST)) {
            $this->model->validator->checkAnswer($_POST);
            $result = $this->model->validator->getResult();
            $vars = ['result' => $result];
            return view('test', $vars)->with('title', 'Test');
        } else {
            return view('test')->with('title', 'Test');
        }
    }
}
