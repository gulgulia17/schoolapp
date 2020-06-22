<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = gallery::all();
        return view('gallery.show',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media=gallery::create($this->validateRequest());
        $this->storedImage($media);
        return redirect('/gallery')->with('status', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        if(!$request->has('image')){
            $gallery->update(
            request()->validate([
                'title1' => 'string',
                'image'  => '',
                'video'  => '',
            ])
        );
        } else{
        $gallery->update($this->validateRequest());
        $this->storedImage($gallery);
    }
    return redirect('/gallery')->with('status','Update Successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect('/gallery')->with('status','Deleted Successfully');
    }
    protected function validateRequest()
    {
        return request()->validate([
            'title1' => 'string',
            'image'  => '',
            'video'  => '',  
        ]);
    }
    protected function storedImage($paper)
    {
        if(request()->hasfile('image')){
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/logo/".time().'.'.$extension;
            $file->move(public_path("../public/images/logo"), $filename);
            $paper->image = $filename;
            $paper->save();
        }
    }

    public function GalleryApi(){
        $gallery = gallery::all();
        return $gallery;
    }
}
