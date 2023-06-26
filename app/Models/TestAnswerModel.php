<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAnswerModel extends Model
{
   protected $table = 'test_answer';
   protected $fillable = ['FIO', 'answer1', 'answer1', 'answer1', 'isCorrect'];
}
