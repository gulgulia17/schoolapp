<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events =  Event::all();
        $event = [];
        foreach($events as $row)
        {
            $event[] =  \Calendar::event(
            $row->title,
            false,
            $row->start_date,
            $row->end_date,
            $row->id,
            [
                'color' => $row->color,
            ]
            );
        }
        $calendar = \Calendar::addEvents($event);
        return view('calendar.eventpage',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendar.addevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     =>'required',
            'color'     =>'required',
            'start_date'=>'required',
            'end_date'  =>'required',
            'start_time'=>'required',
            'end_time'  =>'required',
        ]);
        $events =new Event;

        $events->title      = $request->input('title');
        $events->color      = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date   = $request->input('end_date');
        $events->start_time = $request->input('start_time');
        $events->end_time   = $request->input('end_time');

        $events->save();
        return redirect('/events')->with('status','Events Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Event::all();
        return view('calendar.display')->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
         return view('calendar.editform',compact('event'));
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
        $this->validate($request,[
            'title'     =>'required',
            'color'     =>'required',
            'start_date'=>'required',
            'end_date'  =>'required',
            'start_time'  =>'required',
            'end_time'  =>'required',
        ]);
        $events =Event::findorFail($id);

        $events->title      =$request->input('title');
        $events->color      =$request->input('color');
        $events->start_date =$request->input('start_date');
        $events->end_date   =$request->input('end_date');
        $events->start_time =$request->input('start_time');
        $events->end_time   =$request->input('end_time');
        $events->save();
        return redirect('/events')->with('status','Events Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events =Event::findorFail($id);
        $events->delete();
        return redirect('/events/displaydata')->with('status','Deleted Successfully');
    }
}
