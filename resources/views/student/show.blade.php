@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('studentDetail', $student) }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-3">
                {{-- {{$student->attendances->attendance}} --}}
                    <form action="/student/{{$student->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                    <input type="text" required name="name" id="name" value="{{$student->name}}" class="form-control" placeholder="Enter Full Name of Student">
                        @error('name')
                        <div class="text-danger">**{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <input type="text" required name="fname" class="form-control" value="{{$student->fname}}" placeholder="Enter Father Name">
                        @error('fname')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                        <div class="col-md-6">
                        <input type="text" required name="mname" class="form-control" value="{{$student->mname}}" placeholder="Enter Mother Name">
                        @error('mname')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <input type="text" required name="phone" value="{{$student->phone}}" placeholder="Enter Phone Number" class="form-control" pattern="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" required maxlength="10">
                        @error('phone')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                        <div class="col-md-6">
                        <input type="text" name="email" required class="form-control" value="{{$student->email}}" placeholder="Enter Email Address">
                        @error('email')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                        <input type="text" required name="dob" value="{{$student->dob}}" id="dob" placeholder="Enter Date of Birth" class="form-control">
                        @error('dob')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                    <div class="col-md-4">
                        <select required name="class_id" id="" class="form-control">
                            <option>Please Select class</option>
                            @foreach ($clas as $item)
                            <option value="{{$item->id}}" {{$item->class == $student-> ? 'selected' : ''}}>{{$item->class}}</option>
                            @endforeach
                        </select>
                        @error('class')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="roll_no" class="form-control" value="{{$student->roll_no}}" placeholder="Enter Roll no">
                            <div class="text-danger">{{$student->roll_no ? '':'Enter Student Roll No after save Data'}}</div>
                            @error('roll_no')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="address">Enter Full Address</label>
                            <textarea name="address" id="address" cols="30" rows="8" placeholder="Enter Full Address" class="form-control">{{$student->address}}</textarea>
                            @error('address')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-4">Edit Student</button>
                        </div>
                        <div class="col-md-4">
                            <div class="wrappers">
                                <div class="file-upload" id="#preiv" style="background-image:url('{{$student->images}}');">
                                    <input type="file" name="images" value="{{$student->images}}" id="profile">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="/student/{{$student->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" style="position: relative; top: -64px; left: 155px;">Delete Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
