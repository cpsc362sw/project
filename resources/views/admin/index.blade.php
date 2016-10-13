@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard</div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <label>User Edit:</label>
                        <form method="post" action="{{ url('admin/edit/') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="">
                            <div class="form-group separator">
                                <label class="form-block">User:
                                    <input class="form-control" name="name" value="">
                                </label>
                                <label class="form-block">Email:
                                    <input class="form-control" name="email" value="">
                                </label>
                                <label class="form-block">
                                    Role:
                                    <select name="role" class="form-control">
                                    </select>
                                </label>
                                <button type="submit" class="btn edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                <a href="{{ url('/admin/delete/') }}" class="btn delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
