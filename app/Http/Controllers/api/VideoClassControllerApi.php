<?php

namespace App\Http\Controllers\api;

use App\VideoClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoClassControllerApi extends Controller
{
    public function live($class_id)
    {
        $data = VideoClass::where('class_id' ,$class_id)->where('status', 1)->get();
        return json_encode($data);
    }

    public function record($class_id)
    {
        $data = VideoClass::where('class_id' ,$class_id)->where('status', 0)->get();
        return json_encode($data);
    }

}
