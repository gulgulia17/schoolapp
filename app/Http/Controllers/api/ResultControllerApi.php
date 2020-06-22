<?php

namespace App\Http\Controllers\api;

use App\result;
use App\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($student_id)
    {
        $tot = null ;
        $data = null;
        $student= student::where('id',$student_id )->first()->toArray();
        $result = result::where('student_id',$student_id )->where('status', '1')->first()->toArray();
        if(count($result)){
            $data = [
                'id'         => $result['id'],
                'studentName'=> $student['name'],
                'fName'      => $student['fname'],
                'mName'      => $student['mname'],
                'result'     => $result['result'],
                'totalMarks' => $result['totalMarks'],
                'testName'   => $result['testName'],
            ];
            $s = explode(",",$result['TestDescription']); //subject with marks
            foreach ($s as $key => $value) {
                $x[] = explode(" : ",$value); // chunking subject and marks
            }
            foreach ($x as  $value) {
                $subject[] = [
                    'name' => $value[0],
                    'marks' => $value[1],
                ];
                $tot += $value[1];
            }
            $data['subject'] = $subject;
            $data['total'] = $tot;
        }
        return json_encode($data);
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
    public function recent($id)
    {
        $result = result::where('student_id',$id)->get()->toArray();
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student_id,$class_id)
    {
        $result = result::where('student_id',$student_id)->where('class_id',$class_id)->get();
        if(count($result)){
            $data['testName'][] = 'Total';
            $data['data'][] = 100;
            foreach ($result as $key => $value) {
                $data['testName'][] = $value->testName;
                $data['data'][] = $value->totalMarks;
            }
        return json_encode($data);
        }
        else{
            $data = 0;
            return $data;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
