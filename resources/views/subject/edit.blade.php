@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('subject') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h4 mb-0 text-center">Edit Subjects</h4>
                </div>
                <div class="card-body">
                    <form action="/subject/{{$subject->id}}" method="post">
                        <div class="row">
                        @csrf @method('patch')
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label for="name">Enter subject name</label>
                                <input type="text" name="name" class="form-control" value="{{$subject->name}}" >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Select Class</label>
                            <select name="class_id" class="form-control">
                                <option value="" selected disabled>Select Class for Result</option>
                                    @foreach ($classes as $item)
                                        <option value="{{$item->id}}" {{$subject->class_id==$item->id ? 'selected' : ''}} >{{$item->class}}</option>
                                    @endforeach
                            </select>
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
