<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function index(){
        $data = [
          'status' => false,  
        ];
       if(isset($_POST['file'])){
           $target_file = basename($_FILES['file']['name']);
           $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
           $is_imgae = getimagesize($_FILES['file']['tmp_name']);
           if($is_imgae){
               $data['image'] = time().'.'.$file_type;
               if(move_uploaded_file($FILES['files']['tmp_name'],$data['image'])){
                   $data['status']= true;
               }else{
                   $data['message'] = 'Error on uploading image';
               }
           }else{
               $data['message'] = 'File is not a image';
           }
       }
        header('Access-Control-Allow-Origin:*');
        header('Content-type:application/json');
        echo json_encode($data);
    }
}
