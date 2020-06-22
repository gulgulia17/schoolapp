@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('subject') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create New Subject</h4>
                </div>
                <div class="card-body">
                    <form action="/subject" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="name">Enter subject name</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Select Class</label>
                                <select name="class_id" class="form-control" id="">
                                    <option value="" disabled>Select Class for Result</option>
                                        @foreach ($classes as $item)
                                            <option value="{{$item->id}}">{{$item->class}}</option>
                                        @endforeach
                                </select>
                                @error('class_id')
                                    <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <button type="submit" class="btn btn-info" style="margin-top:32px">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
