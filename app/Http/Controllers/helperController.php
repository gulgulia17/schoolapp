<?php

namespace App\Http\Controllers;

use App\classes;
use App\student;
use Illuminate\Http\Request;

class helperController extends Controller
{
    public function download()
    {
        $filename = "http://aps.schoolapp.info/apk/app-release.apk";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($filename) . "\""); 
        readfile($filename); 
    }
}
