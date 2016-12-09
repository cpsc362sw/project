@extends('layouts.app')

@section('content')
    <style>
        .form-group { clear: both; padding: 10px; }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i>Event Management</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (count(@$success) > 0)
                            <div class="alert alert-success" style="text-align: center;">
                                <strong>Success!</strong><br><br>
                                <label>{{ @$success }}</label>
                            </div>
                        @endif

                        <label><strong>Current Events</strong></label>

                        @if (count($events) > 0)
                            <div class="form-group">
                                @foreach ($events as $event)
                                    <div style="width: 100%; margin: 10px;">
                                        <form class="form-horizontal" method="post" action="{{ url('admin/calendar/update/'.$event->id) }}">
                                            {{ csrf_field() }}
                                            <label for="title" class="control-label col-md-1" style="font-size:16px">Event: </label>
                                            <input name="title" value="{{ $event->title }}" placeholder="Title" style="height: 36px;">
                                            <input name="date" value="{{ $event->date }}" placeholder="Date" style="height: 36px;">
                                            <input name="description" value="{{ $event->description }}" placeholder="Description" style="height: 36px;">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <a class="btn btn-danger" href="{{ url('admin/calendar/delete/'.$event->id) }}">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="form-group">
                                <label>No events currently exist.</label>
                            </div>
                        @endif

                        <div style="width:100%; border-bottom: 1px solid #eee"></div>
                        <label><strong>Create New</strong></label>
                        <form class="form-horizontal" method="post" action="{{ url('admin/calendar/') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="date" class="col-md-4 control-label">Date of Event:</label>
                                <div class="col-md-6">
                                    <input name="date" class="datepicker">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title of Event:</label>
                                <div class="col-md-6">
                                    <input name="title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Description of Event:</label>
                                <div class="col-md-6">
                                    <input name="description">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-calendar"></i> Create Event</button>
                                    <button class="btn btn-primary" type="button" id="back">Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // static dates that we need to populate calendar with
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

            // pull in calendar events to dynamically populate our calendar
            $.ajax('/getCalendarEvents', {
                type: 'get',
                success: function (response) {
                    // parase our json string to object
                    // accessible via data.events
                    var data = $.parseJSON(response);

                    if (data.success) {
                        for (var i = 0; i < data.events.length; i++) {
                            var date = new Date(data.events[i].date)
                            date.setDate(date.getDate()+1);
                            var _date = date.getMonth()+1 + '/' + date.getDate() + '/' + date.getFullYear();

                            eventDates[ new Date(_date) ] = data.events[i].title;
                        }
                    } else {
                        alert('Error: Could not load events for Calendar.');
                    }
                }

            });

            console.log(eventDates);
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

            $("#back").click(function() {
                window.location.href = "/admin/";
            });

        });

    </script>
@endsection
