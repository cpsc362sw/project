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
                            <form method="get" action="{{ url('admin/users/') }}">
                                <input type="text" name="name" value="{{ $user->name }}" />
                                <input type="text" name="email" value="{{ $user->email }}" />
                                <select name="role">
                                    @foreach($role as $id => $rolename)
                                        <option value="{{ $id }}">{{ ucfirst($rolename) }}</option>
                                        @endforeach
                                </select>
                            </form>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
