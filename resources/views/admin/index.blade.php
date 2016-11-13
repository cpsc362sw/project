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
                            <div class="col-md-6 user">
                                <label>
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Users
                                </label>
                            </div>
                        </a>
                        <a href="{{ url('/admin/calendar') }}">
                            <div class="col-md-6 calendar">
                                <label>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    Calendar
                                </label>
                            </div>
                        </a>
                        <a href="{{ url('/admin/reports') }}">
                            <div class="col-md-6 payroll">
                                <label>
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    Reports
                                </label>
                            </div>
                        </a>
                        <a href="{{ url('/admin/timeclock') }}">
                            <div class="col-md-6 timeclock">
                                <label>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    Timeclock
                                </label>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
