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
                        <h1 class="h5 mb-0">Create Notice</h1>
                    </div>
                    <div class="card-body">
                        <form action="/notice" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title of notice" value="{{old('title')}}">
                            @error('title')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input autocomplete="off" type="text" name="date" id="date" class="form-control datepicker" placeholder="Date of notice" value="{{old('date')}}" data-date="{{date('m-d-Y')}}">
                            @error('date')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="description" class="form-control" placeholder="Description of notice">{{old('description')}}</textarea>

                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary">Create Notice</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script>
    CKEDITOR.replace('description');
$('.datepicker').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true,
});
</script>
@endsection
