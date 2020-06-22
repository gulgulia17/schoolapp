<?php

namespace App\Http\Controllers;

use App\Subject;
use App\classes;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = count(Classes::all());
        $subject = Subject::all();
        return view('/subject.show',compact('classes','subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::all();
        $subject = Subject::all();
       return view('/subject.create',compact('classes','subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        subject::create($this->validateRequest());
        return redirect('/subject')->with('status','Subject Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $classes = Classes::all();
        return view('/subject.edit',compact('subject','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($this->validateRequest());
        return redirect('/subject')->with('status','Subject Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/subject')->with('status','Subject Deleted Successfully');
    }

    protected function validateRequest(){
        return request()->validate([
            'name'     => 'required|string',
            'class_id' => 'required|string',
        ]);
    }

    public function SubjectApi(){
        $subject = subject::orderBy('name','desc');
    }
}