<?php

namespace App\Http\Controllers\api;

use App\HomeWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeWorkControllerApi extends Controller
{
    public function store(Request $request)
    {
        HomeWork::create($this->ValidateRequest());
        $temp = "your HomeWork is Submit!! Thank You";
        return  json_encode($temp);
    }

    private function ValidateRequest()
    {
        return Request()->validate([
            'student_id'  => 'string | required',
            'title'       => 'string | required',
            'description' => 'string | required',
            'file'        => 'string | required',
        ]);
    }
    protected function storedImage($paper)
    {
        if (request()->hasfile('file')) {
            $file = request()->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = "/file/studentDetails/" . time() . '.' . $extension;
            $file->move(public_path("../public/file/homework"), $filename);
            $paper->file = $filename;
            $paper->save();
        }
    }
}
