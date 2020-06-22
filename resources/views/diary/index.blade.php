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
{{ Breadcrumbs::render('diary') }}
@endsection
@section('bs')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Diary</h3>

            <div class="card-tools">
              <div class="input-group">
                <input type="text" class="form-control datepicker" data-date="12/03/2012" placeholder="Choose Date">
                <div class="input-group-append">
                  <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed table-bordered text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Class</th>
                  <th>Test</th>
                  <th>Homework</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diary as $key => $item)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>@foreach ($class as $classes)
                    {{$classes->id == $item->class_id ? $classes->class:''}}
                  @endforeach</td>
                  <td>{{$item->test ? $item->test:'null'}}</td>
                  <td>{{$item->homework}}</td>
                  @if ($item->date == date("m/d/Y"))<td class="d-flex justify-content-center">
                  <a href="/diary/{{$item->id}}/edit" class="text-dark"><i class="fas fa-edit"></i></a>
                  <button class="fa fa-trash ml-2 btn-delete" data-toggle="modal" data-target="#myModal{{$item->id}}"></button>
                  <div class="modal" id="myModal{{$item->id}}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Confirm</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                  <h4 class="modal-title">Are You Sure?</h4>
                              </div>
                              <div class="modal-footer">
                                  <form action="/diary/{{$item->id}}" method="post">
                                      @csrf @method('delete')
                                      <button class="btn btn-danger">Delete</button>
                                  </form>
                                  <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  </td>@endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          {{-- Card-footer --}}
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
          {{-- / Card-footer --}}
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();

      var output = ((''+month).length<2 ? '0' : '') + month + '/' + ((''+day).length<2 ? '0' : '') + day + '/' + d.getFullYear() ;

    $('.datepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true,
      });
    $('.datepicker').on('changeDate', function() {
      let date = $(this).val();
      const _token = $('input[name="_token"]').val();
      $.ajax({
        type: "post",
        url: "/diary/check",
        data: {'date':date,'_token':_token},
        success: function (response) {
          $("tbody").each(function(){
                  $(this).find('tr').remove();
          });
          for (let index = 0; index < response.length; index++) {
              const element = response[index];

              var input = "<tr>"+
                              "<td>"+element.id+"</td>"+
                              "<td>"+element.class_id+"</td>"+
                              "<td>"+element.test+"</td>"+
                              "<td>"+element.homework+"</td>"

                              if(element.date == output){
                                var input1 = "<td>"+
                                "<a href='/diary/"+element.id+"/edit'><i class='fas fa-edit'></i></a>"+
                                "</td>";
                                input=input+input1;
                              }
                              +"</tr>";
                  $("tbody").append(input);
          }
        }
      });
    });
</script>
@endsection
