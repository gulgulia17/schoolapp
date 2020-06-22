@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('subject') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Time Table</div>
                <div class="card-body">
                    <form action="/timetable" method="post" id="form">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <select name="testName" class="form-control" id="testName">
                                    <option selected disabled>Please Select Test Name</option>
                                    <option value="unitTest1">Unit Test 1</option>
                                    <option value="unitTest2">Unit Test 2</option>
                                    <option value="unitTest3">Unit Test 3</option>
                                    <option value="half">Half Year Exam</option>
                                    <option value="annual">Annual Exam</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="class_id" class="form-control" id="class">
                                    <option selected disabled>Please Select Class</option>
                                    @foreach ($class as $item)
                                        <option value="{{$item->id}}">{{$item->class}}</option>
                                    @endforeach
                                </select>
                            </div>
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
        $('#class').change(function(e){
            const class_id = $(this).val();
            const _token = $('input[name="_token"]').val();
            const testName = $('select[name="testName"]').val();
            $.ajax({
                type: "post",
                url: "/timetable/check",
                data: {'class_id':class_id, 'testName':testName,'_token':_token},
                success: function (response) {
                    console.log(response);
                    $("form").each(function(){
                            $(this).find('input[type="text"] , button').remove();
                            $(this).find("div[class='form-group row remove']").remove();
                            $(this).find("input[name='subname[]']").remove();
                            $(this).find("input[name='date[]']").remove();
                            $(this).find("input[name='time[]']").remove();
                    });
                    for (let index = 0; index < response.length; index++) {
                        const element = response[index];

                        var input = "<div class='form-group row remove'>"+
                                        "<input type='hidden' value='"+element.name+"' class='form-control' name='subname[]'>"+
                                        "<div class='col-md-6'><input type='text' disabled value='"+element.name+"' class='form-control'></div>"+
                                        "<div class='col-md-3'><input type='date' class='form-control' name='date[]'></div>"+
                                        "<div class='col-md-3'><input type='time' class='form-control' name='time[]'></div>"
                                    +"</div>"

                        $('#form').append(input);
                    }
                    $('#form').append("<div class='form-group text-right'><button class='btn btn-primary'>Submit</button></div>");
                }
            });
        });
    </script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/validation.js"></script>
@endsection
