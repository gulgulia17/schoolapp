@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('facility') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="h4 mb-0 mt-2">Facility</h4>
                    </div>
                        <div class="card-tools">
                        <a  href="/facility/create" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-borderd">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Facility Name</th>
                                <th class=" text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facility as $key => $item)
                            <tr>
                                <td class="h5">{{$key+1}}</td>
                                <td class="h5">{{$item->title}}</td>
                                <td class=" text-center">
                                    <div class="d-flex justify-content-center mt-2">
                                        <a href="/facility/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
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
                                                        <form action="/facility/{{$item->id}}" method="post">
                                                            @csrf @method('delete')
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                    </div>
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
