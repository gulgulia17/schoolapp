@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('result') }}
@endsection
@section('content')
{{-- Create --}}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title font-weight-bolder text-uppercase mt-2">
            Result
          </div>
          <div class="card-tools">
            <a href="/result/create" class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="card-body">
          <form action="/show/detail" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-5">
                <select name="exam" class="form-control" id="">
                  <option selected disabled>Select Exam</option>
                  <option value="UnitTest1"  {{isset($data['exam'])? ($data['exam'] == 'UnitTest1' ? 'selected' : '') :''}}>Unit Test I</option>
                  <option value="UnitTest2"  {{isset($data['exam'])? ($data['exam'] == 'UnitTest2' ? 'selected' : '') :''}}>Unit Test II</option>
                  <option value="UnitTest3"  {{isset($data['exam'])? ($data['exam'] == 'UnitTest3' ? 'selected' : '') :''}}>Unit Test III</option>
                  <option value="Halfyearly" {{isset($data['exam'])? ($data['exam'] == 'Halfyearly' ? 'selected' : '') :''}}>Halfyearly Exam</option>
                  <option value="Annual"     {{isset($data['exam'])? ($data['exam'] == 'Annual' ? 'selected' : '') :''}}>Annual Exam</option>
                </select>
                @error('result')
                <div class="text-danger">*{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <select name="class_id" class="form-control selectClass" id="">
                  <option value="Select Class" selected disabled>Select Class for Result</option>
                  @foreach ($clas as $item)
                  <option value="{{$item->id}}" {{session('data')['class_id'] == $item->id  ? 'selected':''}}>{{$item->class}}</option>
                  @endforeach
                </select>
                @error('result')
                <div class="text-danger">*{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-1">
                <button type="submit" id="sub" class="btn btn-info" disabled>Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Show --}}

@if ($temp)
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-center">
          <h4>Total Student Result</h4>
        </div>
        <div class="card-body table-responsvie p-0">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Result</th>
                <th>Action</th>
              </tr>
            </thead>
            @foreach ($temp as $item)
            <tr>
              <td>
                {{$item->student->name}}
              </td>
              <td>
                {{$item->student->name}}
              </td>
              <td>
                {{$item->TestDescription}}
              </td>
              <td>
                {{$item->result}}
              </td>
              <td>
                <a href="/result/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('js')
<script>
  $(document).ready(function() {
    $("select.selectClass").change(function() {
      var selectedCountry = $(this).children("option:selected").val()
      if (selectedCountry == "Select Class") {
        $("#sub").prop('disabled', true);
      } else {
        $("#sub").prop('disabled', false);
      }
    });
  });

</script>
@endsection
