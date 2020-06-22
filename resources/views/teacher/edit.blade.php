@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('teacher.show', $teacher) }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md 12">
            <div class="card">
                <div class="card-body">
                    <form action="/teacher/{{$teacher->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" value="{{$teacher->name}}" placeholder="Enter Teacher Name">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" name="email" class="form-control" value="{{$teacher->email}}" placeholder="Enter Email Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control" value="{{$teacher->phone}}" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" name="dob" class="form-control" value="{{$teacher->dob}}" placeholder="Date of Birth">
                            </div>
                            <div class="col-md-4">
                                <select name="martial" class="form-control" value="">
                                    <option>Choose Martial Status</option>
                                    <option value="S"  {{$teacher->martial == 'S' ? 'selected' : ''  }}>Single</option>
                                    <option value="M"  {{$teacher->martial == 'M' ? 'selected' : ''  }}>Married</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-auto">
                                  <label for="gender">Gender : &nbsp;</label>
                                   <input type="radio" name="gender" value="M" {{$teacher->gender == 'M' ? 'checked' : ''  }} id="gender"> Male
                                  <input type="radio" name="gender" value="F" {{$teacher->gender == 'F' ? 'checked' : ''  }} id="gender"> Female
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" name="edu" class="form-control" value="{{$teacher->edu}}" placeholder="Education" aria-describedby="helpId">
                                  <small id="helpId" class="text-muted">Only Enter Last Degree and Qualification</small>
                            </div>
                            <div class="col-md-4">
                                <select name="exp" class="form-control">
                                    <option>Choose Experience</option>
                                    <option  value="new" {{$teacher->exp == 'new' ? 'selected' : ''  }}>Fresher</option>
                                    <option  value="1"   {{$teacher->exp == 1 ? 'selected' : ''  }}>1 Year</option>
                                    <option  value="2"   {{$teacher->exp == 2 ? 'selected' : ''  }}>2 Year</option>
                                    <option  value="3"   {{$teacher->exp == 3 ? 'selected' : ''  }}>3 Year</option>
                                    <option  value="4"   {{$teacher->exp == 4 ? 'selected' : ''  }}>4 Year</option>
                                    <option  value="5+"  {{$teacher->exp == '5+' ? 'selected' : '' }}>5 and 5+ Year</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="sub" class="form-control" value="{{$teacher->sub}}" placeholder="Which Subject Teacher">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="address">Enter Full Address</label>
                                <textarea name="address" id="address" cols="30" rows="8" placeholder="Enter Full Address" class="form-control">{{$teacher->address}}</textarea>
                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-4">Edit Teacher</button>
                            </div>
                            <div class="col-md-4">
                                <div class="wrappers">
                                    <div class="file-upload" id="#preiv" style="background-image:url('{{$teacher->images}}');">
                                        <input type="file" name="images" id="profile">
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
