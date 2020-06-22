<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name','email','phone','dob','martial','gender','edu','exp','sub','address','images',
    ];
}
