<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
