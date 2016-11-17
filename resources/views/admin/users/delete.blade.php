@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Users
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Delete
                    </div>
                    <div class="panel-body">
                        <div style="text-align: center">
                            <p>Are you sure you want to delete <b>{{ $user->name }}</b>?</p>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Confirm Delete</button>
                                    <a href="{{ url('/admin/users/') }}" >
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                    </a>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
