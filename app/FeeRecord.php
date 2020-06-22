<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeRecord extends Model
{
    protected $fillable =[
        'student_id', 'fee', 'action', 'class_id', 'date', 'amount'
    ];
    public function student()
    {
       return $this->belongsTo(student::class);
    }
    public function class()
    {
       return $this->belongsTo(classes::class);
    }
}
