<?php

namespace App\Http\Controllers;

use App\fees;
use App\classes;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clas    = classes::all();
        $fees    = fees::all();
        return view('/fees',compact('fees','clas'));
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
        fees::create($this->validateRequest());
        return redirect('/fees')->with('status','Fees Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fees  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(fees $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fees  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(fees $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fees  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fees $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fees  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(fees $fee)
    {
        $fee->delete();
        return redirect('/fees')->with('status','Deleted Successfully!');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'class_id' => 'string',
            'tfees'    => 'string',
            'inst1'    => 'string',
            'inst2'    => 'string'
        ]);
    }

    public function FeesApi(){
        $fees = fees::all();
        return $fees;
    }
}
