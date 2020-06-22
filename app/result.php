<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    protected $fillable = [
        'class_id','student_id','TestDescription','testName','result','totalMarks'
    ];
    public function student()
    {
       return $this->belongsTo(student::class);
    }
}
