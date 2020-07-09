<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    protected $fillable = [
        'student_id','title','description','file', 'class_id'
    ];
    public function student()
    {
       return $this->belongsTo(student::class);
    }

}
