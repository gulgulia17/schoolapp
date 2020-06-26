<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    protected $fillable = [
        'student_id','title','description','file',    
    ];
}
