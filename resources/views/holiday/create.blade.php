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
                    <h4 class="h4 mb-0 text-center">Add Holiday's</h4>
                </div>
                <div class="card-body">
                    <form action="/holiday" method="post">
                        @csrf
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="Enter Holiday Date" value="{{old('date')}}">
                                    @error('date')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Holiday Name" value="{{old('title')}}">
                                    @error('title')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                            <div class="form-group col-md-12 text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
