<?php

namespace App\Http\Controllers;

class HelperController extends Controller
{
    public static function extractVideoId($video_url)
    {
        $parsed_url = parse_url($video_url);

        if ($parsed_url["path"] == "youtube.com/watch") {
            $url = "https://www." . $video_url;
        } elseif ($parsed_url["path"] == "www.youtube.com/watch") {
            $url = "https://" . $video_url;
        } elseif ($parsed_url["path"] == "/watch") {
            $url = "https://" . $video_url;
        } else {
            $url = explode('/', $parsed_url['path'])[1];
            return $url;
        }
        if (isset($parsed_url["query"])) {
            $query_string = $parsed_url["query"];
            parse_str($query_string, $query_arr);
            if (isset($query_arr["v"])) {
                return $query_arr["v"];
            }
        }
    }

    public static function getVideoInfo($url)
    {
        return file_get_contents("https://www.youtube.com/get_video_info?video_id=" . HelperController::extractVideoId($url) . "&cpn=CouQulsSRICzWn5E&eurl&el=adunit");
    }

    public static function getVideoDownloadLink($url)
    {
        parse_str(HelperController::getVideoInfo($url), $data);
        $videoData = json_decode($data['player_response'], true);
        $videoDetails = $videoData['videoDetails'];
        $streamingData = $videoData['streamingData'];
        $streamingDataFormats = $streamingData['formats'];
        $video_title = $videoDetails["title"];
        $final_stream_map_arr = array();
        foreach ($streamingDataFormats as $stream) {
            $stream_data = $stream;
            $stream_data["title"] = $video_title;
            $stream_data["mime"] = $stream_data["mimeType"];
            $mime_type = explode(";", $stream_data["mime"]);
            $stream_data["mime"] = $mime_type[0];
            $start = stripos($mime_type[0], "/");
            $format = ltrim(substr($mime_type[0], $start), "/");
            $stream_data["format"] = $format;
            $stream_data['qualityLabel'] = $stream['qualityLabel'];
            unset($stream_data["mimeType"]);
            $final_stream_map_arr[] = $stream_data;
        }
        return $final_stream_map_arr;
    }
    public function download()
    {
        $filename = "http://aps.schoolapp.info/apk/app-release.apk";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($filename) . "\""); 
        readfile($filename); 
    }
}
