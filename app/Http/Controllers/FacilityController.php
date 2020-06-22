<?php

namespace App\Http\Controllers;

use App\facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility = facility::all();
        return view('facility.show',compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        facility::create($this->validateRequest());
        return redirect('/facility')->with('status', 'New Faciliy Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(facility $facility)
    {
        return view('facility.edit',compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facility $facility)
    {
        $facility->update($this->validateRequest());
        return redirect('/facility')->with('status','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(facility $facility)
    {
        $facility->delete();
        return redirect('/facility')->with('status','Deleted Successfully');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required|string',
        ]);
    }

    public function FacilityApi()
    {
        $facility = facility::orderBy('title','desc')->get();
        return $facility;
    }
}
