@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('classes') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bolder text-center">
                    Create New Class
                </div>
                <div class="card-body">
                    <form action="/classes" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="class">Enter Class Name</label>
                        <input autofocus type="text" name="class" id="class" value="{{old('class')}}" class="form-control" placeholder="Enter Class Name" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">For New Class Create</small>
                        @error('class')
                        <div class="text-danger">*{{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-primary" value="Add New Class">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bolder text-center">
                        Class List
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>
                                    Class
                                </th>
                                <th>
                                    Total Student
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clas as $item)
                                <tr>
                                    <td>
                                        {{$item->class}}
                                    </td>
                                    <td>
                                        {{$item->student}}
                                    </td>
                                    <td>
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
                                                        <form action="/classes/{{$item->id}}" method="post">
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
