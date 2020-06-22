<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fees extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'class_id','tfees','inst1','inst2'
    ];
}
