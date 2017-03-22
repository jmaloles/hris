<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonModule extends Model
{
    //
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
