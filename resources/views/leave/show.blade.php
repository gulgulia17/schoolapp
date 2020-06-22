@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('leave') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-4 h3 mx-auto">Total Student Leave Detail</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mt-2 font-weight-bold">Leaves</div>
                    <div class="card-tools">
                        <form action="/leave/filter" method="post">
                            @csrf
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info">
                                    <input class="custom-radio" type="radio" name="status" value="all" onchange="this.form.submit();"> All
                                </label>
                                <label class="btn btn-success">
                                    <input class="custom-radio" type="radio" name="status" value="1" onchange="this.form.submit();"> Accepted
                                </label>
                                <label class="btn btn-warning">
                                    <input class="custom-radio" type="radio" name="status" value="2" onchange="this.form.submit();"> Pending
                                </label>
                                <label class="btn btn-danger">
                                    <input class="custom-radio" type="radio" name="status" value="0" onchange="this.form.submit();"> Rejected
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leave as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->name}}</td>
                                <td><span class="badge @if($item->status==1) badge-success @elseif($item->status==2) badge-danger @else badge-warning @endif">@if($item->status==1) Accepted @elseif($item->status==2) Rejected @else Pending @endif</span></td>
                                <td>@foreach ($class as $classes)
                                    {{$classes->id == $item->class_id ? $classes->class:''}}
                                  @endforeach</td>
                                <td>{{$item->reason}}</td>
                                <td class="d-flex justify-content-start">
                                    <form action="/leave/{{$item->id}}" method="post">
                                        @csrf @method('patch')
                                        <button class="btn-delete"><i class="fas fa-check text-dark"></i></button>
                                    </form>
                                    <form action="/leave/{{$item->id}}" method="post">
                                        @csrf @method('delete')
                                        <button class="btn-delete"><i class="fas fa-times text-dark"></i></button>
                                    </form>
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
