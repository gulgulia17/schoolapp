@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('teacherCreate') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md 12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title font-weight-bolder">
                        Add Teacher
                    </div>
                </div>
                <div class="card-body">
                    <form action="/teacher" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <input type="text" required name="name" class="form-control" placeholder="Enter Teacher Name" value="{{old('name')}}">
                          @error('name')
                                <div class="text-danger">*{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" required name="email" class="form-control" placeholder="Enter Email Address" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" required name="phone" class="form-control" placeholder="Enter Phone Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" maxlength="10" value="{{old('phone')}}">
                                @error('phone')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" required name="edu" class="form-control" placeholder="Education" aria-describedby="helpId" value="{{old('edu')}}">
                                  <small id="helpId" class="text-muted">Only Enter Last Degree and Qualification</small>
                            </div>
                            <div class="col-md-4">
                                <select required name="exp" class="form-control" value="{{old('exp')}}">
                                    <option>Choose Experience</option>
                                    <option value="new">Fresher</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">3 Year</option>
                                    <option value="4">4 Year</option>
                                    <option value="5+">5 and 5+ Year</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" required name="sub" class="form-control" placeholder="Which Subject Teacher" value="{{old('sub')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" autocomplete="off" required name="dob" class="form-control datepicker" placeholder="Date of Birth" value="{{old('dob')}}">
                                @error('dob')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <select required name="martial" class="form-control" value="{{old('martial')}}">
                                    <option>Choose Martial Status</option>
                                    <option value="S">Single</option>
                                    <option value="M">Married</option>
                                </select>
                                @error('mar')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 my-auto">
                                  <label for="gender">Gender : &nbsp;</label>
                                   <input type="radio" required name="gender" value="M" id="gender" value="{{old('gender')}}"> Male
                                  <input type="radio" required name="gender" value="F" id="gender" value="{{old('gender')}}"> Female
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="address">Enter Full Address</label>
                                <textarea required name="address" id="address" cols="30" rows="8" style="resize:none" placeholder="Enter Full Address" class="form-control" value="{{old('address')}}"></textarea>
                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror

                                <button type="submit" class="btn btn-primary mt-4">Add New Teacher</button>
                            </div>
                            <div class="col-md-4">
                                <div class="wrappers">
                                    <div class="file-upload" id="#preiv" style="background-image:url('/images/avatar2.png');">
                                        <input type="file" required required name="images" id="profile" value="{{old('images')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
      $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      });
    </script>
@endsection
