@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Reports</div>
                    <div class="panel-body">
                        <legend>
                            Reports
                        </legend>
                        <div>
                            <ul class="nav nav-pills">
                                <li class="pills"><a href="{{ url('admin/reports/attendance') }}">Attendance</a></li>
                                <li class="pills disabled">Coming Soon...</li>
                                <li class="pills disabled">Coming Soon...</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <div style="margin-top: 25px;">
                                <button class="btn btn-primary" type="button" id="dash">Back to Dashboard</button>
                            </div>
                        </div>
                        <script>
                            $("#dash").click(function() {
                                window.location.href = "/admin";
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
