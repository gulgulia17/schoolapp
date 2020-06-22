<?php

namespace App\Http\Controllers\api;

use App\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudenControllerApi extends Controller
{
    public function reset(Request $request)
    {
        $data = [
            'username' => $request->username,
            'currentpassword' => $request->currentpassword,
            'newpassword' => $request->newpassword,
            'confirmpassword' => $request->confirmpassword,
        ];
        $studentData = student::where('username',$data['username'])->first();
        $currentpassword = student::where('username',$data['username'])->pluck('password')->first();
        $error;$success;
        if (isset($currentpassword) && isset($data['newpassword'])) {
            if (Hash::check($data['currentpassword'],$currentpassword)) {
                if ($data['newpassword'] === $data['confirmpassword']) {
                    $studentData->password = Hash::make($data['newpassword']);
                    $studentData->save();
                    $success = "Password changed successfully.";
                    return  json_encode($success);
                } else {
                    $error = "Password does not match.";
                    return  json_encode($error);
                }

            } else {
                $error = "Current Password Is Wrong.";
                return  json_encode($error);
            }
        } else {
          $error = "Current Password Is Wrong.";
          return json_encode($error);
        }
    }

    public function login(Request $request)
    {
        
      $username    = $request->username;
      $password    = $request->password;
      $data        = student::where('username', $username)->first();
      $studentDetails = student::where('username', $username)->first();
      if(isset($data->username)){
          if (Hash::check($password, $data->password)) {
              $temp=[
                  'msg' => "Logged",
                  'studentDetails' => $studentDetails,
                ];
              return  json_encode($temp);
          } else {
            $temp="Password wrong";
              return  json_encode($temp);
          }
      }else{
        $temp="Invalid username.";
        return  json_encode($temp);
      }
    }


    public function StudentDetail($id){
        $temp = student::where('username',$id)->first();
        $StudentData = [
            'studentName' => $temp->name,
            'fatherName' => $temp->fname,
            'motherName' => $temp->mname,
            'Phone' => $temp->phone,
            'Class' => $temp->class_id.' '.$temp->section,
            'Address' => $temp->address,
            'Image'   => $temp->images,
        ];
        return json_encode($StudentData);
    }
}
