<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function vacation_leaves()
    {
        return $this->hasMany();
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
