<?php

namespace App\Models;

use App\Models\Validators\ResultVerification;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    public function __construct()
    {
        $this->validator = new ResultVerification();
    }
}
