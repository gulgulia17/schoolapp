<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $fillable = [
        'images','name','vehicle','number',
    ];
}
