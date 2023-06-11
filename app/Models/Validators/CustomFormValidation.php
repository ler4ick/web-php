<?php

namespace App\Models\Validators;

class CustomFormValidation extends FormValidation {

    public function __construct()
    {
        $this->setRule('Вопрос_1','IsNotEmpty');
        $this->setRule("Вопрос_2",'IsNotEmptySelect');
        $this->setRule("Вопрос_3", 'IsNotEmptySelect');
    }
}
