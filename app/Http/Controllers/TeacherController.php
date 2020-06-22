<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Teacher::all();
        return view('/teacher.index', compact('list'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/teacher.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $added=Teacher::create($this->validateRequest());
        $this->storedImage($added);
        return redirect('/teacher')->with('status', 'New Create Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('/teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher ->update($this->validateRequest());
        return redirect('/teacher')->with('status', 'Teacher Detail Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teacher')->with('status','Deleted Successfully');
    }

    public function TeacherApi()
    {
        $list = Teacher::orderBy('name','asc')->get();
        return $list;
    }

    private function validateRequest()
    {
        return request()->validate([
                'name'     => 'required|string',
                'email'    => 'required|string',
                'phone'    => 'required|string',
                'dob'      => 'required|string',
                'martial'  => 'required|string ',
                'gender'   => 'required|string',
                'edu'      => 'required|string',
                'exp'      => 'required|string',
                'sub'      => 'required|string',
                'address'  => 'required|string',
                'images'  => '',
        ]);
    }
    protected function storedImage($paper)
    {
        if(request()->hasfile('images')){
            $file = request()->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/TeacherPic/".time().'.'.$extension;
            $file->move(public_path("../public/images/TeacherPic"), $filename);
            $paper->images = $filename;
            $paper->save();
        }
    }
}