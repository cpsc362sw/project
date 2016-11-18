@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Users
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Edit
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{ $user->email }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role_id" class="col-md-4 control-label">Role</label>
                                <div class="col-md-6">
                                    <select name="role_id">
                                        @foreach($role as $role_id => $role_name)
                                            @if ($role_id == $user->role_id)
                                                <option value="{{ $role_id }}" selected>{{ ucfirst($role_name) }}</option>
                                            @else
                                                <option value="{{ $role_id }}">{{ ucfirst($role_name) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="timeclock" class="col-md-4 control-label">Timeclock</label>
                                <div class="col-md-6">
                                    <a class="btn" href="{{ url('/admin/timeclock/'.$user->id) }}">View Times</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
