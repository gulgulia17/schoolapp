<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('srno')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->string('phone');
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('doa')->nullable();
            $table->string('dob');
            $table->string('scat')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('section')->nullable();
            $table->string('address')->nullable();
            $table->string('images')->nullable();
            $table->string('class_id');
            $table->string('username');
            $table->string('password')->default(Hash::make('12345678'));
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
