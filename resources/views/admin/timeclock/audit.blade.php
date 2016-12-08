@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Timeclock
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Audit
                    </div>
                    <div class="panel-body">
                        <p>Timeclock corrections for <b>{{ $user->name }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
