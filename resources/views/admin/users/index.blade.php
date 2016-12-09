@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Administrative</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Users</div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-default">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="160"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleTitle() }}</td>
                                    <td>
                                        <form class="actions hide" method="get" action="{{ url('admin/users/edit/'.$user->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                                            <button type="submit" class="btn edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            <a href="{{ url('/admin/users/delete/'.$user->id) }}" class="btn delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="clear:both;"></div>
                    <div class="form-group" style="height:50px; margin-top: 25px;">
                        <div style="margin-left:15px;">
                            <button class="btn btn-primary" type="button" id="dash">Back to Dashboard</button>
                        </div>
                    </div>
                    <script>
                        $("#dash").click(function() {
                            window.location.href = "/admin";
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
