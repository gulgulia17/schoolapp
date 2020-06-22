@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('events') }}
@endsection
@section('content')
<style>
    .fc-icon{
        font-size: 1.8em!important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Update Event</h4>
                </div>
                <div class="card-body">
                    <form action="/events/{{$event->id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="Update">
                        <div class="form-group">
                            <label> Name Of Event</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Name" value="{{$event->title}}">
                        </div>

                        <div class="form-group">
                            <label> Enter Color</label>
                            <input type="color" class="form-control" name="color" placeholder="Enter Color" value="{{$event->color}}">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label> Enter Start Date</label>
                                <input type="datetime" class="form-control" name="start_date" placeholder="Enter Start Date" value="{{$event->start_date}}">
                            </div>
                            <div class="col-md-6">
                                <label> Enter Start Time</label>
                                <input type="time" class="form-control" name="start_time" placeholder="Enter Start time" value="{{$event->start_time}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label> Enter End Date</label>
                                <input type="datetime" class="form-control" name="end_date" placeholder="Enter End date" value="{{$event->end_date}}">
                            </div>
                            <div class="col-md-6">
                                <label> Enter End Time</label>
                                <input type="time" class="form-control" name="end_time" placeholder="Enter End time" value="{{$event->end_time}}">
                            </div>
                        </div>
                        <div class="form-group">
                            {{method_field('PUT')}}
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
