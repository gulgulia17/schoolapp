<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'class_id','homework','test','date',
    ];
}
