<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new  ContactModel();
    }

    public function index() {
        return view('contact');
    }

    public function checkAction() {
        $this->model->validator->validate($_POST);
        $errors = $this->model->validator->getErrors();
        $vars = ['errors' => $errors];
        return view('contact', $vars)->with('title', 'Contact');
    }
}
