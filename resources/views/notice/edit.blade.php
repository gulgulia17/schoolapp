@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('notice') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h5 mb-0">Update Notice</h1>
                    </div>
                    <div class="card-body">
                    <form action="/notice/{{$notice->id}}" method="post">
                            @csrf @method('PATCH')
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title of notice" value="{{old('title')? old('title'):$notice->title}}">
                            @error('title')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="date" id="date" class="form-control" placeholder="Date of notice" value="{{old('date')? old('date'):$notice->date}}">
                            @error('date')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="description" class="form-control" placeholder="Description of notice">{{old('description')? old('description'):$notice->description}}</textarea>

                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary">Update Notice</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
