@extends('layouts.app')

@section('content')
    <style>
        .form-group { clear: both; padding: 10px; }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Create Event</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ url('admin/timeclock/') }}">
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
