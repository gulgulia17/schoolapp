@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">For Live Class</div>
                <div class="card-body">
                <form action="/video" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <Label for="class">Class</Label>
                        <select class="form-control" name="class_id" id="class">
                            <option disabled>Select Class</option>
                            @foreach ($class as $item)
                            <option value="{{$item->id}}">{{$item->class}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="from-group">
                        <select name="sub" id="">
                            <option disabled>Select Subject</option>
                            @foreach ($sub as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Enter Your Youtube Live Video Url" id="">
                        <input type="text" name="status" value="1" hidden class="form-control">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">For Video Class</div>
                <div class="card-body">
                <form action="/video" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <Label for="class">Class</Label>
                        <select class="form-control" name="class_id" id="class">
                            <option disabled>Select Class</option>
                            @foreach ($class as $item)
                            <option value="{{$item->id}}">{{$item->class}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="from-group">
                        <select name="sub" id="">
                            <option disabled>Select Subject</option>
                            @foreach ($sub as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Enter Your Youtube Live Video Url" id="">
                        <input type="text" name="status" value="0" hidden class="form-control">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

