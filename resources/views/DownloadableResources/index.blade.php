@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Store Downlodable resource.</h4>
                </div>
                <div class="card-body">
                    <form action="/downloads" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title for downloadable resource.</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title for downloadable resource.">
                            @error('title')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="path">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('path')
                                    <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-right"><button class="btn btn-primary">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
