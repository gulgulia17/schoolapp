<?php

namespace App\Http\Controllers;

use App\Diary;
use App\classes;
use App\Subject;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = date("m/d/Y");
        $diary = Diary::where('date',$currentDate)->get();
        $class = classes::all();
        return view('diary.index',compact('diary','class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = classes::all();
        return view('diary.create',compact('class'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Diary::where('class_id',$request->class_id)->where('date',$request->date)->get()) < 1){
            if(Diary::create($this->homeworkdata($request))){
                return redirect('/diary')->with('status','Successfully Given!');
            }else{
                return redirect('/diary')->with('status','Something went wrong please try again!');
            }
        }else{
            return redirect('/diary')->with('status','Homework already given.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        $class = classes::all();
        return view('diary.edit',compact('diary','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        $diary->update($this->homeworkdata($request));
        return redirect('/diary')->with('status','Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        if ($diary->date == date('m/d/Y')) {
            $diary->delete();
            return redirect('/diary')->with('status','Deleted Successfully!');
        } else {
            return redirect('/diary')->with('status','Oops you don\'t have permission to delete this.');
        }
    }

    public function check(){
        if(request()->class_id){
            $class_id = request()->class_id;
            $data = Subject::where('class_id',$class_id)->get();
            return  $data;
        }
        if(request()->date){
            $diaryall = Diary::where('date',request()->date)->get();
            return  $diaryall;
        }
    }
    public function homeworkdata($request){
        $homeworkdata = [];
        $subname    = $request->subname;
        $homework   = $request->sub;
        for ($i=0; $i < count($homework); $i++) {
            $homeworkdata[$i] = $subname[$i]." : ".$homework[$i];
        }
        $homeworkdata = implode($homeworkdata , ",");

        return $data = [
            'class_id' => $request->class_id,
            'homework' => $homeworkdata,
            'test'     => $request->test,
            'date'     => $request->date,
        ];
    }

    public function DiaryApi()
    {
        $diary = diary::orderBy('date','desc')->get();
        return $diary;
    }
}
