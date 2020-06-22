@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('subject') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5 text-center">
                    Class Time-Table
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeTable as $item)
                            <tr>
                                <td>{{$item->date}}</td>
                                <td>{{$item->time}}</td>
                                <td>{{$item->Subname}}</td>
                                <td>
                                    <a href="/timetable/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
                                    <button class="fa fa-trash ml-2 btn-delete" data-toggle="modal" data-target="#myModal{{$item->id}}"></button>
                                    <div class="modal" id="myModal{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="modal-title">Are You Sure?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/timetable/{{$item->id}}" method="post">
                                                        @csrf @method('delete')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
