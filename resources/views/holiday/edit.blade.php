@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('holiday') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h4 mb-0 text-center">Edit Holidays</h4>
                </div>
                <div class="card-body">
                    <form action="/holiday/{{$holiday->id}}" method="post">
                        @csrf @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="Enter Holiday Date" value="{{$holiday->date}}">
                                    @error('date')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Holiday Name" value="{{$holiday->title}}">
                                    @error('title')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button class="btn btn-primary">Submit</button>
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
