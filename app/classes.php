<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $fillable =['class'];

    public function students()
    {
       return $this->hasMany(student::class);
    }
    
    public function subject()
    {
       return $this->hasMany(subject::class);
    }

    public function feerecorde()
    {
       return $this->hasMany(FeeRecord::class);
    }
}