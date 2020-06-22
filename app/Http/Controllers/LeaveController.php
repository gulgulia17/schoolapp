<?php

namespace App\Http\Controllers;

use App\leave;
use App\classes;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = date("m/d/Y");
        $leave = leave::where('date', '>=',$currentDate)->get();
        $class = classes::all();
        return view('leave.show',compact('leave','class'));
    }

    public function filter()
    {
        $currentDate = date("m/d/Y");
        $filter = request()->status;
        switch ($filter) {
            case 'all':
            $leave = leave::where('date', '>=',$currentDate)->get();
            $class = classes::all();
            return view('leave.show',compact('leave','class'));
                break;
            case '1':
            $leave = leave::where('date', '>=',$currentDate)->where('status','1')->get();
            $class = classes::all();
            return view('leave.show',compact('leave','class'));
                break;
            case '2':
            $leave = leave::where('date', '>=',$currentDate)->where('status','2')->get();
            $class = classes::all();
            return view('leave.show',compact('leave','class'));
                break;
            case '0':
            $leave = leave::where('date', '>=',$currentDate)->where('status','0')->get();
            $class = classes::all();
            return view('leave.show',compact('leave','class'));
                break;
            
            default:
            return null;
                break;
        }
        
        $currentDate = date("m/d/Y");
        $leave = leave::where('date', '>=',$currentDate)->get();
        $class = classes::all();
        return view('leave.show',compact('leave','class'));
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
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(leave $leave)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(leave $leave)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leave $leave)
    {
        $leave->status = '1';
        $leave->save();
        return redirect('/leave')->with('status','Leave Granted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(leave $leave)
    {
        $leave->status = '2';
        $leave->save();
        return redirect('/leave')->with('status','Leave rejected');
    }

    public function LeaveApi(){
        $leave = leave::all();
        return $leave;
    }
}
