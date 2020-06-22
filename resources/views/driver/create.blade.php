@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('driver') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center h4 card-header">Create Driver Detail</div>
    </div>
    <form action="/driver" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-md-4">
                <div class="wrappers">
                    <div class="file-upload" id="#preiv" style="background-image:url('/images/avatar2.png')">
                        <input type="file" name="images" id="profile">
                        @error('images')
                                <div class="text-light bg-danger" style="font-size: 20px;margin-top: 211px;">*{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Driver Name:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Vehicle Number:</label>
                        <input type="text" class="form-control" name="vehicle" value="{{old('vehicle')}}">
                        @error('vehicle')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Mobile Number:</label>
                        <input type="text" class="form-control" name="number" value="{{old('number')}}">
                        @error('number')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button class="mt-4 form-control btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
