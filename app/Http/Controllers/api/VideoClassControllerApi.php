<?php

namespace App\Http\Controllers\api;

use App\VideoClass;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;

class VideoClassControllerApi extends Controller
{
    public function live($class_id)
    {
        $data = [];

        if (VideoClass::where('class_id', $class_id)->where('status', 1)->get()) {
            $LiveVideos = VideoClass::where('class_id', $class_id)->where('status', 1)->get();
            foreach ($LiveVideos as $value) {
                $data[]['videoID'] = HelperController::extractVideoId($value->url);
            }
        }
        return json_encode($data);
    }

    public function record($class_id)
    {
        $data = [];

        if (VideoClass::where('class_id', $class_id)->where('status', 0)->get()) {
            $RecordedVideos = VideoClass::where('class_id', $class_id)->where('status', 0)->get();
            foreach ($RecordedVideos as $value) {
                $data[]['URL'] = HelperController::getVideoDownloadLink($value->url)[0]['url'];
            }
        }
        return json_encode($data);
    }
}
