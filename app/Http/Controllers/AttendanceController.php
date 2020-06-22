<?php

namespace App\Http\Controllers;

use App\classes;
use App\student;
use App\attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $clas= classes::all();
        return view('/attendance.show', compact('clas'));
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
        $currentDate = date("m/d/Y");
        $currentMonth = date("M");
        $studentList = attendance::where('date',$currentDate)->get();
        $totalValue = count(attendance::where('date',$currentDate)->get());
        $totalInput = count($request->student_id);
        if($totalValue != null){
            for ($i=0; $i < $totalValue; $i++){
                for ($j=0; $j <  $totalInput  ; $j++) {
                    if($studentList[$i]->student_id != $request->student_id[$j]){
                        $data[] = [
                        'student_id' => $request->student_id[$j],
                        'attendance' => isset($request->attendance[$j]) ? $request->attendance[$j] : 'A',
                        'reason' => $request->reason[$j],
                        'class_id' => $request->class_id,
                        'date' => $currentDate,
                        'month' => $currentMonth
                    ];
                    }else{
                        return redirect('/attendance')->with('status', 'Already taken !!');
                    }
                }
            }
                    $Mfr= array_column($data, 'student_id');
                    $dupes = array_diff(array_count_values($Mfr), [1]);
                    foreach($dupes as $key => $val){
                        $res[$key]['student_id'] = max(array_intersect_key(array_column($data, 'student_id'), array_intersect($Mfr, [$key])));
                        $res[$key]['attendance'] = max(array_intersect_key(array_column($data, 'attendance'), array_intersect($Mfr, [$key])));
                        $res[$key]['reason'] = max(array_intersect_key(array_column($data, 'reason'), array_intersect($Mfr, [$key])));
                        $res[$key]['class_id'] = max(array_intersect_key(array_column($data, 'class_id'), array_intersect($Mfr, [$key])));
                        $res[$key]['date'] = max(array_intersect_key(array_column($data, 'date'), array_intersect($Mfr, [$key])));
                        $res[$key]['month'] = max(array_intersect_key(array_column($data, 'month'), array_intersect($Mfr, [$key])));
                    };
                    foreach ($res as $key => $value) {

                    attendance::create($res[$key]);
                    }
        }else{
            for ($i=0; $i < count($request->student_id) ; $i++) {
                $data[] = [
                    'student_id' => $request->student_id[$i],
                    'attendance' => isset($request->attendance[$i]) ? $request->attendance[$i] : 'A',
                    'reason' => $request->reason[$i],
                    'class_id' => $request->class_id,
                    'date' => $currentDate,
                    'month' => $currentMonth,
                ];
                attendance::create($data[$i]);
            }
        }
        return redirect('/attendance')->with('status', 'Attendance Taken!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        return view('attendance.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }

    public function check(Request $request)
    {
        $class_id = request()->class_id;
        $count = attendance::where('class_id',$class_id)->where('date',date('m/d/Y'))->get()->count();
        if($count === 0)
        $data = student::where('class_id',$class_id)->get();
        else
        $data = "Attendance already done for this class.";
        return  $data;
    }

    public function AttendanceApi()
    {
        $attendance = attendance::orderBy('date','desc')->get();
        return $attendance;
    }
}
