@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('gallery') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- {{$errors}} --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools"><h3>Upload Image </h3></div>
                </div>
                <div class="card-body">
                    <form action="/gallery" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter image title" name="title1">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Upload Image for App...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                <small class="help-text text-danger">*Upload Image File</small>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools"><h3 for="">Upload YouTube Link</h3></div>
                </div>
                <div class="card-body">
                    <form action="/gallery" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Video title" name="title1">
                        </div>
                        <div class="form-group">
                            <input type="text" name="video" class="form-control" placeholder="Input Video link for App">
                            <small class="help-text text-danger">*Upload YouTube Link</small>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
