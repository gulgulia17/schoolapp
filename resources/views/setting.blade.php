@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('setting') }}
@endsection
@section('content')

<div class="container-fluid">
    @if ($errors->any())
        @foreach ($errors as $item)
            {{$item}}
        @endforeach
    @endif
       <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/setting/{{$data->id}}" method="post" enctype="multipart/form-data" class="p-3 form">
                        @csrf @method('PATCH')
                        <div class="wrappers">
                        <div class="file-upload" id="#preiv" style="background-image:url('{{$data->images}}')">
                            <input type="file" name="images" id="profile">
                        </div>
                        </div>
                        <div class="form-group pt-4">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" placeholder="Enter School Name" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group">
                          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$data->address}}" placeholder="Enter School Address" required autocomplete="address">
                        </div>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" placeholder="Enter School Email" required autocomplete="email">
                          </div>
                          <div class="col-md-6">
                            <input required type="text" name="phone" value="{{$data->phone}}" placeholder="Enter School Phone" class="form-control" pattern="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" required maxlength="10">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-12 font-weight-bold text-uppercase swalDefaultSuccess">update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
