<?php

namespace App\Http\Controllers;

use App\classes;
use App\student;
use App\attendance;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clas = classes::all();
        return view('/classes', compact('clas'));
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
        $data = $request->validate([
            'class' => 'Required | String | unique:classes',
        ]);
        
        classes::create($data);
        return redirect('/classes')->with('status', 'New Class is Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(classes $classes)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classes $classes)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(classes $classes)
    {
        // $classes->delete();
        $student = student::where('class_id',$classes->id)->get();
        $studAttd = attendance::where('class_id',$classes->id)->get();
        foreach($student as $students)
        {
            $students->delete();
        }
        foreach($studAttd as $studAttds)
        {
            $studAttds->delete();
        }
        return redirect('/classes')->with('status', 'Class Deleted!');
    }

    public function ClassesApi(){
        $clas = classes::all();
        return $clas;
    }
}