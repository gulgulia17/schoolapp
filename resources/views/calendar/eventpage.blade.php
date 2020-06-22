@extends('layouts.sidebar')
@section('breadcrumbs')
{{ Breadcrumbs::render('events') }}
@endsection
@section('content')
<style>
    .fc-icon{
        font-size: 1.8em!important;
    }
</style>
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="h5 mb-0 mt-2 font-weight-bolder text-uppercase">Full Calendar</h5>
                        </div>
                        <div class="card-tools">
                            <a href="/events/create" class="btn bg-info"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <a href="/displaydata" class="btn bg-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
{!! $calendar->script() !!}
@endsection
