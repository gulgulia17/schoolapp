@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection
@section('bs')
    <style>
    .small-box-footer {
    background: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
    }
    .info-box1 {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    border-radius: .25rem;
    background: #fff;
    margin-bottom: 1rem;
    min-height: 80px;
    position: relative;
    }
    .info-box1 > .info-box {
    box-shadow: unset;
    }
    </style>
@endsection
@section('content')
<div class="container-fluid">
       <div class="row">
        <div class="col-md-4">
            <div class="info-box1 bg-info">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Students</span>
                  <span class="info-box-number">{{$students}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: {{$percante}}%"></div>
                  </div>
                  <span class="progress-description">
                    {{$percante}}% present today.
                  </span>

                </div>
            </div>
                <div class="small-box-footer">
                    <a href="/attendance" class="text-light">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                </div>
            </div>
                <!-- /.info-box-content -->

        </div>

    </div>
</div>
@endsection
