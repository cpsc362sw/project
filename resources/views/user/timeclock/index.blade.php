@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-user">
                        <div class="user-detail-left">
                            <img class="thumb img-thumbnail rounded float-xs-left" src="{{ URL::asset('/img/default-placeholder.png') }}">
                            <div class="user-info-left">
                                <label class="large-title">{{ ucwords($user->name) }}</label>
                                <label>User ID: {{ $user->id }}</label>
                            </div>
                        </div>
                        <div class="user-detail-right">
                            <div class="user-info-right">
                                <label class="my-messages"><i class="fa fa-envelope" aria-hidden="true"></i></i> My Messages</label>
                                <label class="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>

                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>User</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Timeclock <i class="fa fa-angle-right" aria-hidden="true"></i> Edit</div>
                    <div class="panel-body" style="font-size: 120%;">
                        @foreach($entries as $day => $group)
                        <div class="time-edit-box">
                            <label class="large-title">Day: {{ $day }}</label>
                            <table class="table-striped table-bordered table-hover">
                            @for ($i = 0; $i < 4; $i++)
                                @php (isset($group[$i]->id) ? $entry = $group[$i] : $entry = NULL)
                                <tr style="line-height: 3em;">
                                    <td style="width:150px; font-weight:600; padding-left: 5px;">
&nbsp;&nbsp;                                      {{ ucwords(str_replace('_', ' ', $entryType[$i])) }}:
                                    </td>
                                    <td style="width:500px; padding-left: 25px;">
                                        <label style="border:none; width:75px;">{{ isset($entry->time) ? date('H:i:s', strtotime($entry->time)) : '00:00:00' }}</label>
                                    </td>
                                </tr>
                            @endfor

                            <tr>
                                <td style="width:250px;font-weight: 600;">Time Worked: </td>
                                <td style="padding-left: 25px;">{{ App\Timeclock::getTimeDiff($group) }}</td>
                            </tr>
                            </table>
                        </div>
                        @endforeach
                        <a href="/user" class="btn btn-block">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
