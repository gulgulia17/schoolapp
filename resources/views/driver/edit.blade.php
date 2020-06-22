@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('driver') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center h4 card-header">Edit Driver Detail</div>
    </div>
    <form action="/driver/{{$driver->id}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf  @method('patch')
            <div class="col-md-4">
                <div class="wrappers">
                    <div class="file-upload" id="#preiv" style="background-image:url('{{$driver->images}}')">
                        <input type="file" name="images" id="profile">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Driver Name:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')? old('name'):$driver->name}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Vehicle Number:</label>
                        <input type="text" class="form-control" name="vehicle" value="{{old('vehicle')? old('vehicle'):$driver->vehicle}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Mobile Number:</label>
                        <input type="text" class="form-control" name="number" value="{{old('number')? old('number'):$driver->number}}">
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
