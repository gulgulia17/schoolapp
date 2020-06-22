@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('events') }}
@endsection
@section('content')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-calandar">
                        <div class="card-title">
                            <h5 class="mb-0">Create New Event</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{action('EventController@store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Name of Event</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Name">
                            </div>
                            <div class="form-group">
                                <label>Choose color</label>

                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                  <input type="text" name="color" class="form-control" data-original-title="" title="" placeholder="Choose the color">

                                  <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Enter Start Date of Event</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="start_date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Enter Start Time of Event</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="time" class="form-control" name="start_time" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Enter End Date of Event</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="end_date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Enter End Time of Event</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="time" class="form-control" name="end_time" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                               <button class="btn btn-calandar">Add Event</button>
                            </div>
                        </form>
                        @if(count($errors) > 0)
                        <div class="text-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
    $('#reservationtime').daterangepicker({
      timePicker: true,
      singleDatePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    });
    $('#reservationtime1').daterangepicker({
      timePicker: true,
      singleDatePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm'
      }
    });
    </script>
@endsection
