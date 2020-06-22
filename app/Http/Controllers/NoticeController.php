<?php

namespace App\Http\Controllers;

use App\notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notice = notice::all();
        return view('notice.index',compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        notice::create($this->validateRequest());
        return redirect('/notice')->with('status','Notice Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(notice $notice)
    {
        return view('notice.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notice $notice)
    {
        $notice->update($this->validateRequest());
        return redirect('/notice')->with('status','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(notice $notice)
    {
        $notice->delete();
        return redirect('/notice')->with('status','Deleted successfully!');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title'=>'string|required',
            'date'=>'required',
            'description'=>'string|required',
        ]);
    }

    function readMoreFunction($story_desc) {  
        //Number of characters to show  
        $chars = 250;  
        $story_desc = substr($story_desc,0,$chars);
        $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
        $story_desc .= '</p>';
        return $story_desc;  
    } 

    public function ShowNoticeApi()
    {
        $notice = notice::orderBy('date', 'desc')->get();
        return $notice;
    }
}
