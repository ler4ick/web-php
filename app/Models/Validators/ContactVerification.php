<?php

namespace App\Models\Validators;

class ContactVerification extends CustomFormValidation {

    public $rules = [
        'name' => [
            'isNotEmpty'
        ],
        'gen' => [
            'isNotEmpty'
        ],
        'birthdate' => [
            'isNotEmpty'
        ],
        'message' => [
            'isNotEmpty'
        ],
        'email' => [
            'isEmail'
        ],
        'phone' => [
            'isPhone'
        ],
    ];

    public  function  __construct()
    {
        parent::__construct();
    }
};
