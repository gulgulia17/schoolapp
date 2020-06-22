<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    protected $fillable =[
        'name', 'address', 'email', 'images', 'phone'
    ];
}
