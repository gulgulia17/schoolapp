<?php

namespace App\Http\Controllers;

use App\classes;
use App\HomeWork;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = classes::all();
        return view('/homework.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  Homework::where('class_id' , $request->classes)->get();
        if(empty($data)){
            return "Data Not Found";
        }else{
            return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function show(HomeWork $homeWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeWork $homeWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeWork $homeWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeWork $homeWork)
    {
        //
    }
}
