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
                    <div class="card-title">Create Facility Title</div>
                </div>
                <div class="card-body">
                    <form action="/facility" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Facility Title</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Type New Facility">
                                <div class="input-group-append">
                                <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
