@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('driver') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                <div class="card-title">
                    <h4 class="h4 mb-0 mt-2">Drivers</h4>
                </div>
                <div class="card-tools">
                    <a href="/driver/create" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
               </div>
               <div class="card-body">
                <table class="table table-borderd text-center">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Driver Name</th>
                            <th>Vehicle Number</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($driver as $item)
                        <tr>
                            <td class="w-25"><img src="{{$item->images}}" class="w-100 " height="120px"></td>
                            <td><h5>{{$item->name}}</h5></td>
                            <td><h6>{{$item->vehicle}}</h6></td>
                            <td><h6>{{$item->number}}</h6></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="/driver/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
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
                                                    <form action="/driver/{{$item->id}}" method="post">
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
