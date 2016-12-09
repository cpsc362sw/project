@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Audit
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Time Corrections
                    </div>
                    <div class="panel-body">
                        <p>Timeclock corrections for <b>{{ $user->name }}</b></p>
                        @foreach($entries as $day => $group)
                            <div class="time-edit-box">
                                <label class="large-title">Day: {{ $day }}</label>
                                <table>
                                    @foreach ($group as $entry)
                                        @php
                                            if (isset($oldEntries[$day])) {
                                                foreach($oldEntries[$day] as $struct) {
                                                    if ($entry->action == $struct->action) {
                                                        $oldEntry = $struct;
                                                        break;
                                                    }
                                                }
                                            } else {
                                                $oldEntry = new \App\Timeclock();
                                            }
                                        @endphp
                                        <tr style="line-height: 3em;">
                                            <td style="width:200px; font-weight:600;">
                                                <i class="fa fa-circle-thin" aria-hidden="true" style="font-size: 50%;"></i>
                                                    &nbsp;&nbsp;Old & New {{ ucwords(str_replace('_', ' ', $entry->action)) }}:
                                            </td>
                                            <td style="width:500px;">
                                                <form method="post" action="">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id_audit" value="{{ $entry->id }}" />
                                                    <input type="hidden" name="id_original" value="{{ $oldEntry->id }}" />
                                                    <input name="time_old" value="{{ isset($oldEntry->time) ? date('H:i:s', strtotime($oldEntry->time)) : '00:00:00' }}" style="border:none; width:75px;" disabled="disabled" />
                                                    <input name="time" value="{{ date('H:i:s', strtotime($entry->time)) }}" style="border:none; width:75px;" disabled />
                                                    <button type="submit" name="result" value="replace" class="btn btn-success" style="width:100px;display:inline;"><i class="fa fa-check-circle"></i>&nbspAccept</i></button>
                                                    <button type="submit" name="result" value="delete" class="btn btn-danger" style="width:100px;display:inline;"><i class="fa fa-remove"></i>&nbspReject</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach`

                                    {{--<tr>
                                        <td style="width:250px;font-weight: 600;">Time Worked: {{ App\Timeclock::getTimeDiff($group) }}</td>
                                    </tr>--}}
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
