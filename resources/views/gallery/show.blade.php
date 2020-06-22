@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('gallery') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a  href="/gallery/create" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-borderd text-center">
                        <thead>
                            <tr>
                                <th>Image/Link</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $item)
                            <tr>
                                <td class="w-25">
                                    @if ($item->image == null)
                                    <iframe class="w-100" height="150px"
                                        src={{$item->video}} frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    @elseif($item->video == null)
                                    <img src="{{$item->image}}" class="w-100" height="150px" alt="">
                                    @endif

                                </td>
                                <td>{{$item->title1}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/gallery/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
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
                                                        <form action="/gallery/{{$item->id}}" method="post">
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
