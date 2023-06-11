<?php

namespace App\Models\Validators;

class ResultVerification extends CustomFormValidation {

    private $result = 0;
    private $answers =[];

    public  function  __construct()
    {
        parent::__construct();
        $this->setAnswer('answer1' , 'matrix1');
        $this->setAnswer('answer2' ,'4');
        $this->setAnswer('answer3' ,'Единичная матрица');
    }

    public function checkAnswer($postArray) {
        foreach ($this->answers as $key=> $value) {

            if (array_key_exists($key, $postArray) and $postArray[$key] == $value) {
                $this->result++;
            }
        }
    }

    public function getResult() {
        return $this->result;
    }

    public function setAnswer($fieldName, $ans) {
        $this->answers[$fieldName] = $ans;
    }
};
