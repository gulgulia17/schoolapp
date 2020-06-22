@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('createStudent') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-uppercase font-weight-bolder">Add Student</div>
                </div>
                <div class="card-body">
                    <form action="/student" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter Full Name of Student">
                        @error('name')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                            <input type="text" name="fname" class="form-control" value="{{old('fname')}}" placeholder="Enter Father Name">
                            @error('fname')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <input type="text" name="mname" class="form-control" value="{{old('mname')}}" placeholder="Enter Mother Name">
                            @error('mname')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Enter Phone Number" class="form-control" pattern="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" maxlength="10">
                            @error('phone')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email Address">
                            @error('email')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <input autocomplete="off" type="text" name="dob" value="{{old('dob')}}" id="dob" placeholder="Enter Date of Birth" class="form-control datepicker" data-date="{{date('m-d-Y')}}">
                            @error('dob')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-md-4">
                            <select name="class_id" id="class_id" class="form-control">
                                <option disabled selected>Please select class</option>
                                @foreach ($clas as $item)
                                <option value="{{$item->id}}">{{$item->class}}</option>
                                @endforeach
                            </select>
                            @error('class_id')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-md-4">
                            <input type="text" name="section" class="form-control" value="{{old('section')}}" placeholder="Enter Section">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="address">Enter Full Address</label>
                                <textarea name="address" id="address" cols="30" rows="8" placeholder="Enter Full Address" class="form-control">{{old('address')}}</textarea>
                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-4">Add New Student</button>
                            </div>
                            <div class="col-md-4">
                                <div class="wrappers">
                                    <div class="file-upload" id="#preiv" style="background-image:url('/images/avatar2.png');">
                                        <input type="file" name="images" id="profile">
                                    </div>
                                </div>
                                @error('images')
                                    <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function(){
      $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      });
      });
  </script>
@endsection
@endsection
