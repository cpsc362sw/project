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
            @if(isset($status))<div style="width: 100%; height: 50px; margin: 25px;">{{ $status }}</div>@endif
            <div class="col-md-4">

                {{-- Timeclock --}}
                <div class="user-tiles">
                    <label class="large-title gray-border">Time Clock &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></label>
                    <div class="timeclock-list">
                        <div class="large-title">Today: {{ $today }}</div>
                        <div class="gray-border time"><label>Time In:</label>
                            @if(isset($entries['time_in']))
                                {{ date('H:i:s', strtotime($entries['time_in'])) }}
                            @else
                                <form method="post" action="{{ url('/user/timeclock') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="action" value="time_in">
                                    <button class="add"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </form>
                            @endif
                        </div>
                        <div class="gray-border time"><label>Lunch Out:</label>
                            @if(isset($entries['lunch_out']))
                                {{ date('H:i:s', strtotime($entries['lunch_out'])) }}
                            @else
                                <form method="post" action="{{ url('/user/timeclock') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="action" value="lunch_out">
                                    <button class="add"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </form>
                            @endif
                        </div>
                        <div class="gray-border time"><label>Lunch In:</label>
                            @if(isset($entries['lunch_in']))
                                {{ date('H:i:s', strtotime($entries['lunch_in'])) }}
                            @else
                                <form method="post" action="{{ url('/user/timeclock') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="action" value="lunch_in">
                                    <button class="add"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </form>
                            @endif
                        </div>
                        <div class="gray-border time"><label>Time Out:</label>
                            @if(isset($entries['time_out']))
                                {{ date('H:i:s', strtotime($entries['time_out'])) }}
                            @else
                                <form method="post" action="{{ url('/user/timeclock') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="action" value="time_out">
                                    <button class="add"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="button-wrap">
                        <form action="{{ url('/user/timeclock') }}">
                            <button>Edit Time <i class="fa fa-edit" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- BENEFITS --}}
            <div class="col-md-4">
                <div class="user-tiles">
                    <label class="large-title gray-border">Benefits &nbsp;&nbsp;<i class="fa fa-medkit" aria-hidden="true"></i></label>

                    <div class="benefits-list">
                        <div class="gray-border benefits"><label>Provider:</label></div>
                        <div class="gray-border benefits"><label>Group:</label></div>
                        <div class="gray-border benefits"><label>PCP:</label></div>
                        <div class="gray-border benefits"><label>Since:</label></div>
                    </div>

                    <div class="button-wrap">
                        <form action="{{ url('/user/benefits') }}">
                            <button>Edit <i class="fa fa-edit" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Calendar --}}
            <div class="col-md-4">
                <div class="user-tiles">
                    <label class="large-title gray-border">Calendar &nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></label>

                    <div class="datepicker"></div>


                    <div class="button-wrap">
                        <button>Calendar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax('/getCalendarEvents', {
                type: 'get',
                success: function (response) {

                }
            });


            var eventDates = {};
            eventDates[ new Date( '11/11/2016' )] = "Veterans Day";
            eventDates[ new Date( '11/24/2016' )] = "Thanksgiving Holiday";
            eventDates[ new Date( '11/25/2016' )] = "Thanksgiving Holiday";
            eventDates[ new Date( '12/22/2016' )] = "Christmas Holiday";
            eventDates[ new Date( '12/23/2016' )] = "Christmas Holiday";
            eventDates[ new Date( '12/24/2016' )] = "Christmas Eve";
            eventDates[ new Date( '12/25/2016' )] = "Christmas";
            eventDates[ new Date( '12/26/2016' )] = "Christmas Holiday";
            eventDates[ new Date( '12/27/2016' )] = "Christmas Holiday";

            $( ".datepicker" ).datepicker({
                beforeShowDay: function(date) {
                    var highlight = eventDates[date];
                    if (highlight) {
                        return [true, "event", String(eventDates[date])];
                    } else {
                        return [true, "", ""]
                    }
                }
            });
        });

    </script>
@endsection