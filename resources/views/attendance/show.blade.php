@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('attendance') }}
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <form action="/attendance" method="post">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                    <div class="card-title col-6">
                        <input type="text" disabled name="date" value="{{date("d-m-Y")}}" id="inst2" class="form-control">
                    </div>
                    <div class="card-tool col-6">
                        <form action="/attendance/check" method="post">
                            @csrf
                            @if (auth()->user()->status==0)
                            <select class="form-control"  name="class_id" id="class">
                                <option value="Select Class" class="selet">Select Class</option>
                                @foreach ($clas as $item)
                                    <option value="{{$item->id}}">{{$item->class}}</option>
                                @endforeach
                            </select>    
                            @else
                                <input type="text" name="class_id" hidden id="teacherlog" value="{{$teacher->class_id}}">
                                @foreach ($clas as $item)
                                    @if ($teacher->class_id == $item->id)
                                        <input type="text" disabled name="date" value="{{$item->class}}" class="form-control">
                                    @endif
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>
                </div>
                <div class="card-body">
                        @csrf
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                <th>Student Name</th>
                                <th>Attandance<span class="text-danger">*</span><input type="checkbox" id="checkAll"></th>
                                <th>Reason For Leave</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-right">
                            <input type="submit" class="btn btn-info m-2" id="sub" disabled value="Submit">
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('js')
    <script>
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        @if (auth()->user()->status == 0)
        $('#class').change(function(e){
            const class_id = $(this).val();
            const _token = $('input[name="_token"]').val();
        @else
        $(document).ready(function() {
            const class_id = $('#teacherlog').val();
            const _token = $('input[name="_token"]').val();
        setTimeout(function() {
        jQuery.support.cors = true;
        @endif
            $.ajax({
                type: "post",
                url: "/attendance/check",
                data: {'class_id':class_id,'_token':_token},
                success: function (response) {
                    $('input:checkbox').removeAttr('checked');
                    $("table").each(function(){
                            $(this).find('td').remove();
                    });
                    if($.isArray(response)){
                        for (let index = 0; index < response.length; index++) {
                            const element = response[index];
                            console.log(element);
                            var input =
                            '<tr><td>'+element.name+'<input type="hidden" name="student_id[]" value="'+element.id+'"></td>'+
                            '<td><div class="form-group">'+
                            '<div class="custom-control custom-switch">'+
                            '<input type="checkbox" class="custom-control-input" id="customSwitch'+element.id+'" name="attendance['+index+']" value="P">'+
                            '<label class="custom-control-label" for="customSwitch'+element.id+'"></label>'+
                            '</div>'+
                            '</div></td>'+
                            "<td><input type='text' class='form-control' placeholder='Enter Reason for Absent' name='reason[]'></td></tr>";
                            $('tbody').append(input);
                        }
                    }else{
                        alert(response);
                    }
                }
            });
        });
        @if (auth()->user()->status == 1)
    },3000);
        @endif
    </script>
    <script>
        $(document).ready(function(){
        $("select.form-control").change(function(){
            var selectedCountry  = $(this).children("option:selected").val()
            if( selectedCountry == "Select Class"){
                $("#sub").prop('disabled', true);
            }else{
                $("#sub").prop('disabled', false);
            }
          });
        });
        </script>
@endsection
