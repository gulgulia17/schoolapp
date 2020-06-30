<?php

namespace App\Http\Controllers\api;

use App\HomeWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeWorkControllerApi extends Controller
{
    public function store(Request $request)
    {
        $this->storedImage(HomeWork::create([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $request->file,
        ]));
        $data['message'] = "Thankyou your homework is submitted successfully.";
        $data['status'] = 200;
        return  json_encode($data);
    }

    protected function storedImage($paper)
    {
        if (request()->hasfile('file')) {
            $file = request()->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path("../public/file/homework"), $filename);
            $paper->file = $filename;
            $paper->save();
        }
    }
}
