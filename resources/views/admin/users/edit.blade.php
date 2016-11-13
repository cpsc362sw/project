@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Users
                        <i class="fa fa-angle-right" aria-hidden="true"></i> Edit
                        <br />
                        <table class="table table-striped table-hover">
                            <form method="post" action="">
                                <input type="text" name="name" value="{{ $user->name }}" />
                                <input type="email" name="email" value="{{ $user->email }}" />
                                <select name="role_id">
                                    @foreach($role as $role_id => $role_name)
                                        <option value="{{ $role_id }}">{{ ucfirst($role_name) }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Edit User</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
