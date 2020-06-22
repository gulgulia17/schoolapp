@php
    function readMoreFunction($story_desc) {
        $temp = $story_desc;
        //Number of characters to show
        $chars = 45;
        $story_desc = substr($story_desc,0,$chars);
        // $story_desc = substr($story_desc,0,strrpos($story_desc,' '));
        strlen($temp) > strlen($story_desc)
        ? $story_desc .= '<span class="pl-1 font-weight-bold">...</span></p>' : '';
        echo $story_desc;
    }
@endphp
@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('notice') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title font-weight-bolder text-uppercase mt-2 ml-2">All Notice</div>
                    <div class="card-tools">
                        <a href="/notice/create"><i class="fa fa-plus text-dark mr-2" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-borderd text-center">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notice as $value)
                            <tr>
                                <td>{{$value->title}}</td>
                                <td>{{$value->date}}</td>
                                <td>
                                    @php readMoreFunction($value->description); @endphp
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/notice/{{$value->id}}/edit" class="text-dark"><i class="fas fa-edit"></i></a>
                                        <button class="fa fa-trash ml-2 btn-delete" data-toggle="modal" data-target="#myModal{{$value->id}}"></button>
                                        <div class="modal" id="myModal{{$value->id}}">
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
                                                        <form action="/notice/{{$value->id}}" method="post">
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