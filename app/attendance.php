<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
        'student_id','attendance','reason','class_id','date','month',
    ];

    public function student()
    {
       return $this->belongsTo(student::class);
    }

}
