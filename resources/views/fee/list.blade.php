@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('leave') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-4 h3 mx-auto">Total Student Fee Record</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mt-2 font-weight-bold">Fee Record</div>
                    <div class="card-tools">
                        <form action="/record" method="post">
                            @csrf
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info">
                                    <input class="custom-radio" type="radio" name="action" value="all" onchange="this.form.submit();"> All
                                </label>
                                <label class="btn btn-success">
                                    <input class="custom-radio" type="radio" name="action" value="1" onchange="this.form.submit();"> Paid
                                </label>
                                <label class="btn btn-warning">
                                    <input class="custom-radio" type="radio" name="action" value="0" onchange="this.form.submit();"> Unpaid
                                </label>
                                <select name="fee" id="" class="form-control bg-primary p-2" onchange="this.form.submit();">
                                    <option selected disabled>Select Installment</option>
                                    <option value="1st Installment">First Installment</option>
                                    <option value="2nd Installment">Second Installment</option>
                                    <option value="3rd Installment">Final Installment</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Installment</th>
                                <th>Amount</th>
                                <th>Date</th>
                                {{-- <th>Status</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temp as $key => $item)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->student->name}}</td>
                                <td>{{$item->class->class}}</td>
                                <td>{{empty($item->fee) ? 'Not available' : $item->fee}}</td>
                                {{-- <form action="/feerecord/{{$item->id}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                <td>@if (empty($item->amount))
                                    <input type="text" class="form-control" name="amount" placeholder="Enter amount"/>
                                @else
                                    {{$item->amount}}
                                @endif</td>
                                <td>@if (empty($item->date))
                                    <input type="text" class="form-control" name="date" placeholder="Enter Date"/>
                                @else
                                    {{$item->date}}
                                @endif</td>
                                
                                <td><span class="badge @if($item->action==1) badge-success @else badge-warning @endif">@if($item->action==1) Paid @else Unpaid @endif</span></td>
                                <td>
                                    <select name="action" id="" class="form-control" onchange="this.form.submit();">
                                        <option selected disabled>Action</option>
                                        <option value="1">Paid</option>
                                        <option value="0">Unpaid</option>
                                    </select>
                                </form>
                                </td> --}}
                                <td>{{$item->amount}}</td>
                                <td>{{$item->date}}</td>
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
