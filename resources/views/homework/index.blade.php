@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/homework" id="form" class="row" method="post">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="classes">Class</label>
                                <select name="classes" class="form-control" id="classes">
                                    <option disabled>Select Class</option>
                                    @foreach ($class as $item)
                                    <option value="{{$item->id}}">{{$item->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Class</label>
                                <input type="date" name="time" id="time" class="form-control">
                                <button type="submit">ss</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="data">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Show</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('js')
<script>
    $('#time').change(function(e){
        const _token = $('input[name="_token"]').val();
        const classes = $('select[name="classes"]').val();
        const time = $(this).val();
        $.ajax({
            type: "post",
            url: "/homework",
            data: {
                '_token':_token,
                'classes':classes,
                'time':time,
            },
            success: function (response) {
                $("table").each(function(){
                        $(this).find('td').remove();
                });
                console.log(response);
                if($.isArray(response)){
                    // for (let index = 0; index < response.length; index++) {
                        // const val = response[index];
                        // console.log(element);
                        $.each(response, function (key, val) {
                        var input =
                        '<tr><td>'+val.student.name+'</td>'+
                        '<td><div class="form-group">'+
                        '<div class="custom-control custom-switch">'+
                        '<input type="checkbox" class="custom-control-input" id="customSwitch'+val.id+'" name="attendance['+key+']" value="P">'+
                        '<label class="custom-control-label" for="customSwitch'+val.id+'"></label>'+
                        '</div>'+
                        '</div></td>'+
                        "<td><input type='text' class='form-control' placeholder='Enter Reason for Absent' name='reason[]'></td></tr>";
                        $('tbody').append(input);
                    });
                }else{
                    alert(response);
                }
            }
        });
    });
</script>
@endsection
@endsection
