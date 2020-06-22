<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    protected $fillabele=[
        'id','date','name','reason','status','class_id',
    ];
}