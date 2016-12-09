@extends('layouts.app')
<style>
    table { width: 100%; font-size: 16px; margin-bottom: 15px; padding: 15px !important;}
    th, td { padding: 5px !important; padding-left: 10px !important; }
    th { width: 50%; }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Reports</div>
                    <div class="panel-body">
                        <legend>
                            Attendance for {{ date('l\, F jS\, Y ') }}
                        </legend>
                        <div>
                            <label style="font-size: 20px;">Present</label>
                            <table class="table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Time In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($present) > 0)
                                    @foreach($present as $k => $v)
                                        <tr>
                                            <td>{{ $v['user'] }}</td>
                                            <td>{{ $v['time'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <br>
                            <label style="font-size: 20px;">Absent</label>
                            <table class="table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Time In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count(@$absent) > 0)
                                    @foreach($absent as $k => $v)
                                        <tr>
                                            <td>{{ $v['user'] }}</td>
                                            <td>N/A</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button class="btn btn-primary" type="button" id="dash">Back to Dashboard</button>
                                <button class="btn btn-primary" type="button" id="reports">Back to Reports</button>
                            </div>
                        </div>
                        <script>
                            $("#reports").click(function() {
                                window.location.href = "/admin/reports";
                            });
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
