<?php

namespace App\Http\Controllers;

use App\classes;
use App\Subject;
use App\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class=classes::all();
        return view('timetable.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class=classes::all();
        return view('timetable.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
       $class = Subject::where('class_id', $request->class_id)->get();
       return  $class;
    }
    public function store(Request $request)
    {
      $timetable = TimeTable::where('class_id',$request->class_id)->get();
      if(count($timetable)){
       foreach ($timetable as $key => $value) {
           $value->status = 0;
           $value->save();
            for ($i=0; $i < count($request->subname); $i++) {
            $data[$i]=[
                'class_id'  => $request->class_id,
                'testName'  => $request->testName,
                'subname'   => $request->subname[$i],
                'date'      => date("d-m-Y", strtotime($request->date[$i])),
                'time'      => $request->time[$i],             ];
                TimeTable::create($data[$i]);
        }
        }
      }else{
        for ($i=0; $i < count($request->subname); $i++) {
            $data[$i]=[
                'class_id'  => $request->class_id,
                'testName'  => $request->testName,
                'subname'   => $request->subname[$i],
                'date'      => date("d-m-Y", strtotime($request->date[$i])),
                'time'      => $request->time[$i],   
            ];
            TimeTable::create($data[$i]);
        }
      }
        return redirect('/timetable')->with('status','Timetable inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $timeTable = TimeTable::where('status','1')->where('class_id',$id)->get();
      return view('timetable.show', compact('timeTable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTable $timetable)
    {
        return view('/timetable.edit',compact('timetable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeTable $timetable)
    {
        $timetable->update(
            $data=[
                'date'      => date("d-m-Y", strtotime($request->date)),
                'time'      => $request->time,  
            ]
        );
        return back()->with('/status', 'Time-Table Updated Successfully');
    
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTable $timetable)
    {
        $timetable->delete();
        return back()->with('status', 'Deleted Successfully!!');
    }
}
