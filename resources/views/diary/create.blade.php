@php
    function readMoreFunction($story_desc) {
        //Number of characters to show
        $chars = 45;
        $story_desc = substr($story_desc,0,$chars);
        $story_desc = substr($story_desc,0,strrpos($story_desc,' '));
        $story_desc .= '<span class="pl-1 font-weight-bold">...</span></p>';
        echo $story_desc;
    }
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
                    <form action="/diary" method="post" id="form">
                        @csrf
                        <input type="hidden" name="date" value="{{date("m/d/Y")}}">
                        <div class="form-group">
                            <select name="class_id" id="class" class="form-control">
                                <option>Choose class</option>
                                @foreach ($class as $value)
                                    <option value="{{$value->id}}">{{$value->class}}</option>
                                @endforeach
                            </select>
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
    </script>
@endsection
