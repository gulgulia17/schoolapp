<?php

namespace App\Http\Controllers;

use App\school;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(school $school)
    {
       
       
    }

    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\school  $school
     * @return \Illuminate\Http\Response
     */
    public function show(school $school)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\school  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(school $school, $id)
    {
        $data = school::findorFail($id);
        return view('/setting', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\school  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, school $setting)
    {
        $setting->update($this->validateRequest());
        $this->storedImage($setting);
        return redirect('/setting/1/edit')->with('status', 'School Updation Complete!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\school  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(school $school)
    {
        //
    }
    private function validateRequest()
    {
        return request()->validate([
            'name'      => 'string | required',
            'address'   => 'string | required',
            'email'     => 'string | required | email',
            'phone'     => 'string | required',
            'images'    => '',
        ]);

    }
    private function storedImage($paper)
    {
        if(request()->hasfile('images')){
            $file = request()->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/logo/".time().'.'.$extension;
            $file->move(public_path("../public/images/logo"), $filename);
            $paper->images = $filename;
            $paper->save();
        }
    }
}
