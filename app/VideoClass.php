<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoClass extends Model
{
    protected $fillable = [
        'class_id', 'url', 'status'
    ];
}
