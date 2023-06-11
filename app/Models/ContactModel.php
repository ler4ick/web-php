<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Validators\ContactVerification;


class ContactModel extends Model
{
    public function __construct()
    {
        $this->validator = new ContactVerification();
    }
}
