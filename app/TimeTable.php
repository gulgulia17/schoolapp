<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $fillable =[
    'class_id','testName','subname','date','time'  
    ];
}
