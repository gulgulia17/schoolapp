@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
    <div class="row">
        @if($message = Session::get('success'))
        <div class="alert alert-success col-md-12">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0 text-center" style="
                        text-transform: uppercase;
                        font-size: 1rem;
                        font-weight: bold;
                    ">Import Student</h1>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="class_id" id="class_id" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $item)
                                    <option value="{{$item->id}}">{{$item->class}}</option>
                                @endforeach
                            </select>
                            @error('class_id')
                            <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="student_data">Student Sheet</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="student_data" id="student_data" accept=".xlsx, .xls">
                                <label class="custom-file-label" for="student_data">Choose file</label>
                            </div>
                            @error('student_data')
                            <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
