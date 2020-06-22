@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('result') }}
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title font-weight-bolder text-uppercase mt-2">
            Create Result
          </div>
        </div>
        <div class="card-body">
          <form action="/result/open" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-5">
                <select name="exam" class="form-control" id="">
                  <option selected disabled>Select Exam</option>
                  <option value="UnitTest1" {{session('data')['exam'] == "UnitTest1"  ? 'selected':''}}>Unit Test I</option>
                  <option value="UnitTest2" {{session('data')['exam'] == "UnitTest2"  ? 'selected':''}}>Unit Test II</option>
                  <option value="UnitTest3" {{session('data')['exam'] == "UnitTest3"  ? 'selected':''}}>Unit Test III</option>
                  <option value="Halfyearly " {{session('data')['exam'] == "Halfyearly" ? 'selected':''}}>Half Year Exam</option>
                  <option value="Annual" {{session('data')['exam'] == "Annual" ? 'selected':''}}>Annal Exam</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <select name="class_id" class="form-control" id="class">
                  <option value="" selected disabled>Select Class for Result</option>
                  @foreach ($clas as $item)
                  <option value="{{$item->id}}" {{session('data')['class_id'] == $item->id  ? 'selected':''}}>
                    {{$item->class}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-1">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @if (session('class'))
      <form action="/result" method="post">
        @csrf
        <div class="card">
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th style="width:9%!important;">Roll No</th>
                  <th class="container-fluid">
                    <div class="row">
                      @foreach (session('subject') as $item)
                      <div class="col-md-2 mx-auto">
                        <span>{{$item->name}}</span>
                      </div>
                      @endforeach
                    </div>
                  </th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
                @foreach (session('class') as $item)
                <tr>
                  <td>{{$item->name}}
                    <input type="hidden" name="rollno[{{$item->id}}]" value="{{$item->name}}">
                    <input type="hidden" name="testName" value="{{session('data')['exam']}}">
                    <input type="hidden" name="class_id" value="{{session('data')['class_id']}}">
                  </td>
                  <td class="container-fluid">
                    <div class="row">
                      @foreach (session('subject') as $iitem)
                      <div class="col-md-2 mx-auto">
                        <input type="text" name="rollno[{{$item->id}}][{{$iitem->name}}]" class="form-control">
                      </div>
                      @endforeach
                    </div>
                  </td>
                  <td>
                    <select name="score[]" class="form-control" style="width:56px">
                      <option value="P">P</option>
                      <option value="F">F</option>
                    </select>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>
@endsection
