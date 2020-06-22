<?php

namespace App\Http\Controllers;

use App\student;
use App\attendance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = student::all()->count();
        if($students == null){
            $percante = '0';
            return view('home',compact('students','percante'));
        }else{
            $present = attendance::where('date',date('m/d/Y'))->where('attendance','P')->get()->count();
            $percante = floor((($present/$students)*100));
            return view('home',compact('students','percante'));
        }
        
        
    }
}
