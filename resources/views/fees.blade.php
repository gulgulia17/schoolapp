@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('fees') }}
@endsection
@section('bs')
<style>
@media (max-width:500px){
    td.border-top-0 > .form-group{
        width: 7rem!important;
    }
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mt-2">Add Fess</div>
                    <div class="card-title"></div>
                </div>
                <div class="card-body">
                    <form action="/fees" method="POST" class="table-responsive">
                        @csrf
                        <table class="table text-center responsive">
                            <thead>
                                <tr>
                                    <th>Choose Class</th>
                                    <th>Total Fees</th>
                                    <th>1st Installment</th>
                                    <th colspan="2" class="text-left pl-md-5">2nd-3rd Installment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="form-group">
                                            <select name="class_id" id="class" class="form-control">
                                                <option disabled>Please Select class</option>
                                                @foreach ($clas as $item)
                                                    <option value="{{$item->id}}">{{$item->class}}</option>
                                                @endforeach
                                            </select>
                                            @error('class')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="form-group">
                                            <input type="text" name="tfees" id="tfees" class="form-control" placeholder="Total Fees">
                                            @error('tfees')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="form-group">
                                            <input type="text" name="inst1" id="inst1" class="form-control" placeholder="1st Installment">
                                            @error('inst1')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="form-group">
                                            <input type="text" name="inst2" id="inst2" class="form-control" placeholder="2nd-3rd Installment">
                                            @error('inst2')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Add Fee</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Fees of all class</div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Total Fees</th>
                                <th>1st Installment</th>
                                <th>2nd Installment</th>
                                <th>3rd Installment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $item)
                            <tr>
                                <td class="text-capitalize">{{$item->class_id}}</td>
                                <td class="text-capitalize">{{$item->tfees}}</td>
                                <td class="text-capitalize">{{$item->inst1}}</td>
                                <td class="text-capitalize">{{$item->inst2}}</td>
                                <td class="text-capitalize">{{$item->inst2}}</td>
                                <td>
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
                                                    <form action="/fees/{{$item->id}}" method="post">
                                                        @csrf @method('delete')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
  $('#tfees').focusout(function() {
    !$(this).val() ? alert('Please Enter Total Fees') : '';
    !$.isNumeric($(this).val()) ? alert('Please Enter Valid Amount') : '';
    if ($(this).val() && $.isNumeric($(this).val())) {
      var inst1 = (($(this).val() * 40) / 100);
      var inst2 = ((($(this).val() - (($(this).val() * 40) / 100))) / 2);
      $('#inst1').val(inst1);
      $('#inst2').val(inst2);
    } else {
      $('#inst1').val('');
      $('#inst2').val('');
    }
  });

</script>
@endsection