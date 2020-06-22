@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('holiday') }}
@endsection
@section('bs')
<style>
 .badge-light{
     background-color: #cec8c8;
 }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="h4 mb-0">Show Total Holidays</h4>
                    </div>
                    <div class="card-tools">
                        <a href="/holiday/create" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Holiday Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if (count($date))
                            <tbody>
                                <tr>
                                    <td style="vertical-align:middle">January</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jan')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jan')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">Febuary</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Feb')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Feb')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">March</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Mar')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Mar')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">April</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Apr')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Apr')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">May</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'May')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'May')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">June</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jun')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jun')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">July</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jul')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Jul')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">August</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Aug')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Aug')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">September</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Sep')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Sep')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">October</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Oct')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Oct')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">November</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Nov')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Nov')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">December</td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Dec')
                                                 <span class="badge badge-light">{{$item->date}} </span> <span class="text-info">{{$item->title}}</span><br>
                                             @endif
                                         @endforeach
                                    </td>
                                    <td>
                                         @foreach ($date as $item)
                                             @if (date('M',strtotime($item->date))== 'Dec')
                                                 <a href="/holiday/{{$item->id}}/edit"><i class="fas fa-edit text-dark"></i></a><br>
                                             @endif
                                         @endforeach
                                    </td>
                                </tr>
                             </tbody>
                            @endif
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <button class="fa fa-trash ml-2 btn-delete" data-toggle="modal" data-target="#myModal{{$item->id}}"></button>
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
                <form action="/holiday/{{$item->id}}" method="post">
                    @csrf @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <button class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div> --}}
