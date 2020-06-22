<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TimeTable;

class TimetableControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $timetable = TimeTable::where('status','1')->where('class_id',$class_id)->get()->toArray();
        if(!empty($timetable)){
        foreach ($timetable as $key => $value) {
            $data[] =
            [
                'id'      => $value['id'],
                'date'    => $value['date'],
                'subname' => $value['Subname'],
            ];
            $testName = $value['testName'];
        }
        $temp['data'] = $data;$temp['testname'] = $testName;
        return json_encode($temp);
        }else{
            $temp['data'] = '';
            $temp['testname'] = '';
            return json_encode($temp);
        }
    }
}
