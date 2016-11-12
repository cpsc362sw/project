@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Timeclock</div>
                        <form method="post" action="{{ url('admin/timeclock/') }}">
                             {{ csrf_field() }}
                                     <button type="submit" class="btn edit">Time In</button>
                                     <button type="submit" class="btn edit">Time out</button>
                                     <button type="submit" class="btn edit">Lunch In</button>
                                     <button type="submit" class="btn edit">Lunch out</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
