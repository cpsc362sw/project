@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Audit
                    </div>
                    <div class="panel-body">
                        <p>Select a user for timeclock corrections:</p>
                        <form class="form-horizontal" role="form" method="post" action="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="id" class="col-md-4 control-label">Name</label>
                                <div class="col-md-4">
                                    <select name="id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> View Corrections </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
