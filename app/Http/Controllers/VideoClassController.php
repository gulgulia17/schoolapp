<?php

namespace App\Http\Controllers;

use App\classes;
use App\VideoClass;
use Illuminate\Http\Request;

class VideoClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = classes::all();
        return view('/videoclass.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VideoClass::create($this->ValidateRequest());
        return redirect('/video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoClass  $videoClass
     * @return \Illuminate\Http\Response
     */
    public function show(VideoClass $videoClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoClass  $videoClass
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoClass $videoClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoClass  $videoClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoClass $videoClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoClass  $videoClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoClass $videoClass)
    {
        //
    }
    public function ValidateRequest()
    {
        return Request()->validate([
            'class_id' => 'required | string',
            'url' => 'required | string',
            'status' => 'required | string',
        ]);
    }
}
