@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('subject') }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h4">Edit Time Table</div>
                <div class="card-body">
                    <form action="/timetable/{{$timetable->id}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group row">
                            <div class="col-md-3">
                               <label for="">Date</label>
                                <input type="date" class="form-control" name="date" value="{{$timetable->date}}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="time" value="{{$timetable->time}}">
                            </div>
                            <div class="col-md-5">
                                <label for="">Subject</label>
                                <input type="text" disabled class="form-control" name="subname" value="{{$timetable->Subname}}">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary" type="submit" style="margin-top:31px">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection