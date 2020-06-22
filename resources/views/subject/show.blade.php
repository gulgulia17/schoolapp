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
                    <div class="card-title">
                        <h4 class="h4 mb-0">Show Total Subjects</h4>
                    </div>
                    <div class="card-tools">
                        <a href="/subject/create" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($j = 1; $j <= $classes; $j++)
                                @foreach ($subject as $item)
                                <tr>
                                    @if ($item->class_id == $j)
                                        <td>{{  $item->class->class }}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a href="/subject/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
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
                                                            <form action="/subject/{{$item->id}}" method="post">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
