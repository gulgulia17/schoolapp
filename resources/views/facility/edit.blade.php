@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('facility') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 h3 text-center">Edit Facility Title</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/facility/{{$facility->id}}" method="POST">
                @csrf @method('patch')
                <div class="form-group">
                    <label for="">Facility Title</label>
                <input type="text" name="title" class="form-control" placeholder="Type New Facility" value="{{$facility->title}}">
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
