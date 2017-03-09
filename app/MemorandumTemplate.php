<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemorandumTemplate extends Model
{
    //
    protected $fillable = ['sender', 'topic', 'content'];
}
