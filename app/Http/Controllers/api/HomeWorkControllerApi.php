<?php

namespace App\Http\Controllers\api;

use App\student;
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
        $class_id = student::where('id', request()->student_id)->first();
        $data = Request()->validate([
            'student_id'  => 'string | required',
            'title'       => 'string | required',
            'description' => 'string | required',
            'file'        => 'string | required',
            'class_id'    => 'string | required',
        ]);
        $data['class_id'] = $class_id->class_id;
        dd($data);
        return $data;
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
