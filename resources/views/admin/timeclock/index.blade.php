@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Timeclock</div>
                        <form method="post" action="{{ url('admin/timeclock/') }}">
                             {{ csrf_field() }}
                                     <button type="submit" name="action" class="btn edit" value='time_in'>Time In</button>
                                     <button type="submit" name="action" class="btn edit" value='time_out'>Time out</button>
                                     <button type="submit" name="action" class="btn edit" value='lunch_in'>Lunch In</button>
                                     <button type="submit" name="action" class="btn edit" value='lunch_out'>Lunch out</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
