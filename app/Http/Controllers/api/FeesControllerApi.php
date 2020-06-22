<?php

namespace App\Http\Controllers\api;

use App\FeeRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeesControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $Fees['fees'] = FeeRecord::where('student_id',$id)->get()->toArray();
        return json_encode($Fees);
        // arjun
    }
}
