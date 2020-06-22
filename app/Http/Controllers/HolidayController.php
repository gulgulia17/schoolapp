<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = holiday::orderBy('date','asc')->get();
        return view('/holiday.show',compact('date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('holiday.create');
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
            'date'  => 'required|string',
            'title' => 'required|string',
        ]);
        Holiday::create($data);
        return redirect('/holiday')->with('status','Holiday Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday)
    {
        return view('/holiday.edit',compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        $holiday->update($this->validateRequest($request));
        return redirect('/holiday')->with('status','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function HolidayApi()
    {
        $holiday = holiday::orderBy('date','desc')->get();
        return $holiday;
    }

     public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect('/holiday')->with('Deleted Successfully');
    }

    protected function validateRequest($request){
        return $request->validate([
            'date'  => 'required|string',
            'title' => 'required|string',
        ]);
    }
}
