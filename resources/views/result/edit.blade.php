@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('result') }}
@endsection
@section('bs')

@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Report Card
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>Student Name</td>
              <td>{{$result->student->name}}</td>
            </tr>
            <tr>
              <td>Father Name</td>
              <td>{{$result->student->fname}}</td>
            </tr>
            <tr>
              <td>Mother Name </td>
              <td>{{$result->student->mname}}</td>
            </tr>
            <tr>
              <td>Class</td>
              <td>{{$result->student->}}</td>
            </tr>
            <form action="/result/{{$result->id}}" method="post">
              @csrf
              @method('patch')
              <tr>
                <td>Subject</td>
                <?php
                                $str = $result->TestDescription;
                                $arr=explode(",",$str);
$mainValue = implode("
",$arr);
                ?>
                <td><textarea name="TestDescription" id="" cols="30" class="form-control" rows="10">{{ $mainValue }}</textarea></td>
              </tr>
              <tr>
                <td> <label for="">Result</label>
                  <select name="result" class="form-control">
                    <option value="P" {{ $result->result == 'P' ? 'selected' : ''}}>PASS</option>
                    <option value="F" {{ $result->result == 'F' ? 'selected' : ''}}>FAIl</option>
                  </select>
                </td>
                <td>
                  <label for="">Test Name</label>
                  <select name="exam" class="form-control" id="">
                    <option selected disabled>Select Exam</option>
                    <option value="UnitTest1" {{$result->testName == "UnitTest1"  ? 'selected':''}}>Unit Test I</option>
                    <option value="UnitTest2" {{$result->testName == "UnitTest2"  ? 'selected':''}}>Unit Test II</option>
                    <option value="UnitTest3" {{$result->testName == "UnitTest3"  ? 'selected':''}}>Unit Test III</option>
                    <option value="Halfyearly " {{$result->testName == "Halfyearly" ? 'selected':''}}>Half Year Exam</option>
                    <option value="Annual" {{$result->testName == "Annual" ? 'selected':''}}>Annal Exam</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-right">
                  <button type="submit" class="btn btn-primary">Update Student Result</button>
                </td>
              </tr>
            </form>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
