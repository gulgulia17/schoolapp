@if ($diary->date == date('m/d/Y'))
@php
$data = explode(',',$diary->homework);
for ($i=0; $i < count($data) ; $i++) {
    $key[] = explode(':',$data[$i]);
}
for ($j=0; $j < count($key); $j++) {
        $subject[] = $key[$j][0];
        $homework[] = $key[$j][1];
}
$work = array_combine($subject, $homework);
@endphp

@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('diary-create') }}
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="h5 mb-0">ADD TO DIARY</h1>
            </div>
            <div class="card-body">
                <form action="/diary/{{$diary->id}}" method="post" id="form">
                    @csrf @method('patch')
                    <input type="hidden" name="date" value="{{$diary->date}}">
                    <div class="form-group">
                        <input name="class_id" id="class" class="form-control" type="hidden" value="{{$diary->class_id}}">
                        <input class="form-control" disabled value="@foreach ($class as $value){{$diary->class_id==$value->id?$value->class:''}}@endforeach">
                        @foreach ($work as $subject => $homework)
                        <input type="hidden" value="{{$subject}}" class="form-control" name="subname[]">
                        <div class="form-group row mt-3">
                            <div class="col-2">
                                <input disabled placeholder="{{$subject}}" class="form-control" name="subname[]">
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="sub[]" placeholder="{{$subject}}" value="{{$homework}}">
                            </div>
                        </div>

                        @endforeach
                        <div class="form-group row">
                            <div class="col-2"><input disabled class="form-control" placeholder="Test"></div>
                            <div class="col-10"><input class="form-control" placeholder="Test" name="test"  value="{{$diary->test}}"></div>
                        </div>
                    </div>
                    <div class="form-group text-right"><button class="btn btn-primary font-weight-bold ">UPDATE</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
{{-- <script>
        const class_id = $('#class').val();
        const _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: "/diary/check",
            data: {'class_id':class_id,'_token':_token},
            success: function (response) {
                $("form").each(function(){
                        $(this).find('input[type="text"] , button').remove();
                        $(this).find("input[name='subname[]']").remove();
                });
                for (let index = 0; index < response.length; index++) {
                    const element = response[index];

                    var input = "<div class='form-group'>"+
                                    "<input type='hidden' value='"+element.name+"' class='form-control' name='subname[]'><input type='text' class='form-control' name='sub[]' placeholder='"+element.name+"'>"
                                +"</div>"

                    $('#form').append(input);
                }
                $('#form').append("<div class='form-group'><input type='text' placeholder='If any test.' name='test' class='form-control'></div><div class='form-group text-right'><button class='btn btn-primary'>Submit</button></div>");
            }
        });
    $('#class').change(function(e){
        const class_id = $(this).val();
        const _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: "/diary/check",
            data: {'class_id':class_id,'_token':_token},
            success: function (response) {
                $("form").each(function(){
                        $(this).find('input[type="text"] , button').remove();
                        $(this).find("input[name='subname[]']").remove();
                });
                for (let index = 0; index < response.length; index++) {
                    const element = response[index];

                    var input = "<div class='form-group'>"+
                                    "<input type='hidden' value='"+element.name+"' class='form-control' name='subname[]'><input type='text' class='form-control' name='sub[]' placeholder='"+element.name+"'>"
                                +"</div>"

                    $('#form').append(input);
                }
                $('#form').append("<div class='form-group'><input type='text' placeholder='If any test.' name='test' class='form-control'></div><div class='form-group text-right'><button class='btn btn-primary'>Submit</button></div>");
            }
        });
    });
</script> --}}
@endsection
@else
@section('content')
<div style="
position: absolute;
top: 45%;
left: 32%;
">
<h1 class="font-weight-bolder text-center align-middle">Oops you don't have permission to edit this.</h1>
<p class="text-center"><a href="/diary" class="font-weight-bolder text-uppercase">go back</a></p>
</div>
@endsection
@endif
