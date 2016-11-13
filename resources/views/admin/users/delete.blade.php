@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Users
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Delete

                        <p>Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                        <button type="submit" class="btn edit">Yes</button>
                        <a href="{{ url('/admin/users/') }}" >
                            <button type="submit" class="btn edit">No</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
