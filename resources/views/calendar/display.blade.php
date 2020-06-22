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
                    <h4>Show Event</h4>
                </div>
                <div class="card-body">
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr class="warning">
                                <th> Id </th>
                                <th> Name </th>
                                <th> Color </th>
                                <th> Start Date</th>
                                <th> End Date </th>
                                <th> Update </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        @foreach ($events as $event)
                        <tbody>
                            <tr>
                                <td>{{ $event->id}}</td>
                                <td>{{ $event->title}}</td>
                                <td>{{ $event->color}}</td>
                                <td>{{ $event->start_date}}--{{ $event->start_time}}</td>
                                <td>{{ $event->end_date}}--{{ $event->end_time}}</td>
                                <th><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">Edit</a>
                                </th>

                                <th>
                                    <form method="POST" action="/events/{{$event->id}}">
                                        {{csrf_field()}}
                                        @method('delete')
                                        <input type="hidden" name="method" value="Delete">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
