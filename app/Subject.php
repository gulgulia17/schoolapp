<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name','class_id',
    ];

    public function class()
    {
        return $this->belongsTo(classes::class);
    }
}
