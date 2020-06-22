<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DownloadableResources;
class DownloadableResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DownloadableResources.index');
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
        $downloadableData = DownloadableResources::create($this->validateRequest($request));
        $this->storedImage($downloadableData);
        return back()->with('status','Uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required|string',
            'path'  => 'required|mimes:jpg,jpeg,png,pdf,csv,txt',
        ]);
    }

    protected function storedImage($paper)
    {
        if(request()->hasfile('path')){
            $file = request()->file('path');
            $extension = $file->getClientOriginalExtension();
            $filename = "/downloadable/files/".time().'.'.$extension;
            $file->move(public_path("/downloadable/files"), $filename);
            $paper->path = $filename;
            $paper->save();
        }
    }
}
