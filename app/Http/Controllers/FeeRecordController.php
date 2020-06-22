<?php

namespace App\Http\Controllers;

use App\classes;
use App\student;
use App\FeeRecord;
use Illuminate\Http\Request;

class FeeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp=FeeRecord::all();
       return view('/fee.list', compact('temp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_id = classes::all();
        $student_id = student::all();
        return view('/fee/index', compact('class_id', 'student_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->checkform ==1){
            feeRecord::create($this->validateRequest());
        }else{
            $data = $request->studentname;
            $keys = array_keys($data);
            foreach ($data as $key => $val) {
                $value[] = $val;
                $temp[]=[
                    'fee'   => $request->fee,
                    'class_id'   => $request->class_id,
                ];
            }
            foreach ($value as $key => $fess) {
                $temp[$key]['student_id']=$request->studentname[$key];
                $temp[$key]['amount']=$request->amount[$key];
                $temp[$key]['date']=$request->date[$key];
                if(isset($temp[$key]['date'])){
                    $temp[$key]['action']=1;
                }
                else{
                    $temp[$key]['action']=0;
                }
                feeRecord::create($temp[$key]);
            }
        }
        return redirect('/feerecord')->with('status', 'Fee Updated!!');
    }
    
    public function validateRequest()
    {
        return Request()->validate([
            'student_id' => 'required | string',
            'class_id'   => 'required | string',
            'amount'     => 'required | string',
            'date'       => 'required | string',
            'action'     => 'required | string',
            'action'     => 'required | string',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\FeeRecord  $feeRecord
     * @return \Illuminate\Http\Response
     */
    public function show(FeeRecord $feeRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeeRecord  $feeRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeRecord $feeRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeeRecord  $feeRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeRecord $feerecord)
    {
        // $feerecord->update([
        //     'amount' => $request->amount,
        //     'date' => $request->date,
        //     'action' => $request->action,
        // ]);
        // return redirect('feerecord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeeRecord  $feeRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeRecord $feeRecord)
    {
        //
    }

    public function record(Request $request)
    {
        if(isset($request->fee)){
            $temp = FeeRecord::where('fee', $request->fee)->get();
            return view('fee.list',compact('temp'));
        }else{
            $filter = request()->action;
            switch ($filter) {
                case 'all':
                    $temp = FeeRecord::all();
                    return view('fee.list',compact('temp'));
                    break;
                case '1':
                    $temp = FeeRecord::where('action', '1')->get();
                    return view('fee.list',compact('temp'));
                    break;
                case '0':
                    $temp = FeeRecord::where('action', '0')->get();
                    return view('fee.list',compact('temp'));
                    break;
                default:
                return null;
                    break;
            }
        }
    }

    public function check(Request $request)
    {
        $choice = $request->fee;
        $student = student::where('class_id', $request->class_id)->get();
        switch ($choice) {
            case '1st Installment':
                return count(FeeRecord::where('fee',$choice)->where('class_id',$request->class_id)->get()) ? 'Already Exist' : $student;
                break;
            case '2nd Installment':
                $st = count(FeeRecord::where('fee','1st Installment')->where('class_id',$request->class_id)->get());
                //  ? $student : '1st Installment not found.';
                $nd = count(FeeRecord::where('fee','2nd Installment')->where('class_id',$request->class_id)->get());
                if(empty($st)){
                    return '1st Installment not found.';
                }elseif(!empty($nd)){
                    return '2nd Installment Already Exist.';
                }else{
                    return $student;
                }
                break;
            case '3rd Installment':
                $st = count(FeeRecord::where('fee','1st Installment')->where('class_id',$request->class_id)->get());
                $nd = count(FeeRecord::where('fee','2nd Installment')->where('class_id',$request->class_id)->get());
                $rd = count(FeeRecord::where('fee','3rd Installment')->where('class_id',$request->class_id)->get());
                if(empty($st)){
                    return '1st Installment not found.';
                }elseif(empty($nd)){
                    return '2nd Installment not found.';
                }elseif(!empty($rd)){
                    return '3rd Installment Already Exist.';
                }else{
                    return $student;
                }
                // return ($st == 1 && $nd == 1) ? $student : 'Previous Installment not found.';
                break;
            default:
                break;
        }

    }
}
