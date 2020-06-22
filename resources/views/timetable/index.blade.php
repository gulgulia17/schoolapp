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
                    <div class="card-title h4 ml-1">
                        All Class Time Table
                    </div>
                    <div class="card-tools">
                       <a href="/timetable/create"><i class="fa fa-plus text-dark mr-3" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body table-responsvie p-0">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>S. NO.</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->class}}</td>
                                <td>
                                <a href="/timetable/{{$item->id}}"><i class="fa fa-eye text-dark" aria-hidden="true"></i> </a>
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
