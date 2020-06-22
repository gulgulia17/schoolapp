<?php

namespace App\Http\Controllers;

use App\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = driver::all();
        return view('driver.show',compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temp = driver::create($this->validateRequest());
        $this->storedImage($temp);
        return redirect('/driver')->with('status', 'Driver Detail Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        return view('driver.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, driver $driver)
    {
        if (!$request->has('images')) {
            $driver->update(
                request()->validate([
                    'images'=> '',
                    'name'  => 'string|required',
                    'vehicle'=> 'string|required',
                    'number' => 'string|required',
                ])
            );
        } else {
            $driver->update($this->validateRequest());
            $this->storedImage($driver);
        }        
        return redirect('/driver')->with('status','update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver)
    {
        $driver->delete();
        return redirect('/driver')->with('status','Deleted Successfully');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'images'=> 'required|mimes:png,jpg,jpeg|file|max:10000',
            'name'  => 'string|required',
            'vehicle'=> 'string|required',
            'number' => 'string|required',
        ]);
        
    }
    protected function storedImage($paper)
    {
        if(request()->hasfile('images')){
            $file = request()->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/driver/".time().'.'.$extension;
            $file->move(public_path("../public/images/driver"), $filename);
            $paper->images = $filename;
            $paper->save();
        }
    }

    public function DriverApi(){
        $driver = driver::all();
        return $driver;
    }
}
