<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
   protected $fillable =[
      'srno','roll_no','name','fname','mname','phone','gender','email','doa',
      'dob','scat','aadhar','section','address','images','class_id','username','password',
   ];
 
   public function class()
   {
      return $this->belongsTo(classes::class);
   }

   public function attendances()
    {
       return $this->hasMany(attendance::class);
    }
    public function result()
    {
       return $this->hasMany(result::class);
    }
    public function feerecorde()
    {
       return $this->hasMany(FeeRecord::class);
    }
   
}

