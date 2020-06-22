<?php

namespace App\Http\Controllers\api;

use App\attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$month)
    {
        
        $date = date('m/d/Y', strtotime("-30 day", strtotime(date('m/d/Y'))));
        if(attendance::where('student_id',$id)->where('month',$month)->orderBy('date','desc')->first() == null){
            $currentDateAttendance['currentDayAttendance'] = [];
        }else{
            $currentDateAttendance['currentDayAttendance'] = [attendance::where('student_id',$id)->where('month',$month)->orderBy('date','desc')->first()->toArray()];
        };

        $currentDateAttendance['remainingAttendance'] = attendance::where('student_id',$id)->where('month',$month)->orderBy('date','desc')->get()->toArray();
        // dd($currentDateAttendance);
        return json_encode($currentDateAttendance);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
