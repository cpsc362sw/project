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
                        @foreach($entries as $day => $group)
                            <div class="time-edit-box">
                                <label class="large-title">Day: {{ $day }}</label>
                                <table>
                                    @foreach ($group as $entry)
                                        <tr style="line-height: 3em;">
                                            <td style="width:150px; font-weight:600;">
                                                <i class="fa fa-circle-thin" aria-hidden="true" style="font-size: 50%;"></i>
                                                &nbsp;&nbsp;                                      {{ ucwords(str_replace('_', ' ', $entry->action)) }}:
                                            </td>
                                            <td style="width:500px;">
                                                <form method="post" action="{{ url('/user/timeclock/edit') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $entry->id }}" />
                                                    <input type="hidden" name="type" value="{{ $entry->action }}" />
                                                    <input type="hidden" name="date" value="{{ $day }}" />
                                                    <input value="{{ date('H:i:s', strtotime($entry->time)) }}" style="border:none; width:75px;" disabled="disabled" />
                                                    <input name="time" value="{{ date('H:i:s', strtotime($entry->time)) }}" />
                                                    <button class="btn btn-block" style="width:150px;display:inline;">Submit Change&nbsp;<i class="fa fa-pencil"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach`

                                    <tr>
                                        <td style="width:250px;font-weight: 600;">Time Worked: {{ App\Timeclock::getTimeDiff($group) }}</td>
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
