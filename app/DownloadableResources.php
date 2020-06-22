<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadableResources extends Model
{
    protected $fillable = [
        'title','path'
    ];
}
