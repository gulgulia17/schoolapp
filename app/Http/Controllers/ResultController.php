<?php

namespace App\Http\Controllers;

use App\result;
use App\classes;
use App\student;
use App\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clas   = classes::all();
        $temp   = 0;
        return view('/result.index', compact('clas','temp'));

    }
    /**
     * Show the form for creating a new resource.
     *  `
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clas=classes::all();
        return view('/result.create', compact('clas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $result = result::where('class_id',$request->class_id)->where('testName','!=',$request->testName)->get();
        if(count($result)){
            foreach ($result as $change) {
                $change->status = 0;
                $change->save();
            }
        }
        $data = $request->rollno;
        $keys = array_keys($data);
        foreach ($data as $key => $val) {
            $value[] = $val;
            $temp[]=[
                'class_id'   => $request->class_id,
                'testName'   => $request->testName,
            ];
        }
        for ($i=0; $i < count($value); $i++) {
        $totalInt= 0;
            foreach ($value[$i] as $key1 => $total) {
                $result0[$i][] = $key1." : ".$total;
                $int = (int)$total;
                $totalInt = $int + $totalInt;
                if($request->testName == 'Annual'){
                    $marks = count($value[$i]) * 100;
                    $totalResult[$i]= $totalInt / $marks * 100;  
                }elseif($request->testName == 'Halfyearly'){
                    $marks = count($value[$i]) * 70;
                    $totalResult[$i]= $totalInt / $marks * 100;     
                }else{
                    $marks = count($value[$i]) * 10;
                    $totalResult[$i]= $totalInt / $marks * 100;  
                }
            }
            $temp[$i]['student_id']=$keys[$i];
            $temp[$i]['TestDescription']=implode(',',$result0[$i]);
            $temp[$i]['result']=$request->score[$i];
            $temp[$i]['totalMarks']=$totalResult[$i];
            result::create($temp[$i]);
        }
        return redirect('/result')->with('status', ' The Result are Updated!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(result $result)
    {
        return view('/result.edit', compact ('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, result $result)
    {
        $str  = $request->TestDescription;
        $arr  =(explode("\r\n",$str));
        $temp = implode(",",$arr);
        $data = [
            'result'          => $request->result,
            'TestDescription' => $temp,
            'testName'        => $request->exam,

        ];
        $result->update($data);
        return back()->with('status', 'Result Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(result $result)
    {
        //
    }

    public function createResult(Request $request)
    {
        $temp = count(result::where('testname',$request->exam)->where('class_id',$request->class_id)->get());
        if(!$temp){
            $data = [
                "exam" => $request->exam,
                "class_id" => $request->class_id,
            ];
            $class_id = student::where('class_id', $request->class_id)->get();
            $subject  = Subject::where('class_id', $request->class_id)->get();
            return redirect('/result/create')->with([
                'class'   => $class_id,
                'subject' => $subject,
                'data'    => $data
            ]);
        }else
        {
            return redirect('/result/create')->with('status', 'Already Exist!!');
        }
    }

    public function showDetail(Request $request)
    {
        $data=[
            'class_id' => $request->class_id,
            'exam' => $request->exam,
        ];
        $clas   = classes::all();
        $temp = result::where('class_id',$request->class_id)->where('testName',$request->exam)->get();
        
        return view('result.index',compact('temp', 'clas'))->with([
            'data'=> $data,
        ]);
    }
}


//faltu
// public function ResultApi()
//   {
//       $result = result::all();
//       return $result;
//   }
// public function showStudent(Request $request)
// {
//     $data = [
//         "exam"     => $request->exam,
//         "class_id" => $request->class_id,
//     ];
//     $exam = $request->exam;
//     $clas = classes::all();
//     $class_id = $request->class_id;
//     $class = classes::where('id', $class_id)->get();
//     $total = count(result::where('testName' , $exam)->where('class_id' , $class_id)->get());
//     $pass = count(result::where('result' ,'P')->where('testName' , $exam)->where('class_id' , $class_id)->get());
//     $fail = count(result::where('result' ,'F')->where('testName' , $exam)->where('class_id' , $class_id)->get());
//     $result = $class[0]['class'];
//     return back()->with([
//         'result'=> $result,
//         'total' => $total,
//         'clas'  => $clas,
//         'fail'  => $fail,
//         'pass'  => $pass,
//         'data'  => $data
//     ]);
// }