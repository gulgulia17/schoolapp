@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('teacher') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md 12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-2">Teachers</h3>
                    <div class="card-tools">
                        <a href="/teacher/create" class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                  </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Phone</td>
                                <td>Subject</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->sub}}</td>
                                <td class="d-flex">
                                    <a href="/teacher/{{$item->id}}/edit" class="text-dark"><i class="fas fa-edit"></i></a>
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
                                                    <form action="/teacher/{{$item->id}}" method="post">
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
