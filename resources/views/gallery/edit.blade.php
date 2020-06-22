@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('gallery') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Edit Detail</h3>
                </div>
                <div class="card-body">
                    <form action="/gallery/{{$gallery->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            @if ($gallery->video == null)
                                <div class="col-md-8">

                                        <div class="form-group">
                                        <input type="text" class="form-control" value="{{$gallery->title1}}" placeholder="Enter image title" name="title1">
                                        </div>
                                        <div class="form-group mt-5">
                                            <div class="custom-file">
                                                <input type="file" name="image" value="{{$gallery->image}}" class="custom-file-input" id="validatedCustomFile">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file</label>
                                                @error('image')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                                <small class="help-text text-danger">*Upload Image File</small>
                                            </div>
                                        </div>
                                        <div class="form-group text-right mt-5">
                                            <input type="submit" class="btn btn-info" value="Submit">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                <img src="{{$gallery->image}}" class="w-100 h-75" alt="">
                                </div>
                            @elseif($gallery->image == null)
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$gallery->title1}}" placeholder="Enter Video title" name="title2">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="video" class="form-control" value="{{$gallery->video}}" placeholder="Input Video link for App">
                                        <small class="help-text text-danger">*Upload YouTube Link</small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="submit" class="btn btn-info" value="Submit">
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection