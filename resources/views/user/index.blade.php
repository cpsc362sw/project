@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ $username }}'s</b> Dashboard</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label name="last_login">Last Login: {{ $last_login }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection