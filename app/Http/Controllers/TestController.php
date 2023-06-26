<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use App\Models\TestAnswerModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $model;

    protected $testAnswerModel;

    function __construct()
    {
        $this->model = new  TestModel();
        $this->testAnswerModel = new TestAnswerModel();
    }

    public function index()
    {
        $testAnswers = TestAnswerModel::all();
        return view('test', ['testAnswers' => $testAnswers])->with('title', 'Test');
    }

    /* function checkAction()
    {
        if (!empty($_POST)) {
            $this->model->validator->checkAnswer($_POST);
            $result = $this->model->validator->getResult();
            $vars = ['result' => $result];
            return view('test', $vars)->with('title', 'Test');
        } else {
            return view('test')->with('title', 'Test');
        }
    } */

    function checkAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->model->validator->checkAnswer($request->all());
            $result = $this->model->validator->getResult();
            $this->saveAnswer($request, $result);
            $vars = ['result' => $result];
            $testAnswers = TestAnswerModel::all();
            return view('test', $vars, ['testAnswers' => $testAnswers])->with('title', 'Test');
        } else {
            $testAnswers = TestAnswerModel::all();
            return view('test', ['testAnswers' => $testAnswers])->with('title', 'Test');
        }
    }

    function saveAnswer(Request $request, int $result) {
        if ($request->isMethod('post')) {
            $this->testAnswerModel->FIO = $request->input('name');
            $this->testAnswerModel->group = $request->input('group');
            $this->testAnswerModel->answer1 = $request->input('answer1');
            $this->testAnswerModel->answer2 = $request->input('answer2');
            $this->testAnswerModel->answer3 = $request->input('answer3');
            $this->testAnswerModel->isCorrect = $result;
            $this->testAnswerModel->save();
        }
    }
}
