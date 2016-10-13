@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Administrative</b> Dashboard
                    </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    <div class="panel-body">
                        <a href="{{ url('/admin/users') }}">
                            <div class="col-md-6 user"></div>
                        </a>
                        <a href="{{ url('/admin/calendar') }}">
                            <div class="col-md-6 calendar"></div>
                        </a>
                        <a href="{{ url('/admin/payroll') }}">
                            <div class="col-md-6 payroll"></div>
                        </a>
                        <a href="{{ url('/admin/timeclock') }}">
                            <div class="col-md-6 timeclock"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
