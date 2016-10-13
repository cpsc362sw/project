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
                    <label>Users:</label>
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleTitle() }}</td>
                                    <td></td>
                                </tr>
                            <form method="post" action="{{ url('admin/edit/'.$user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <button type="submit" class="btn edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                <a href="{{ url('/admin/delete/'.$user->id) }}" class="btn delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
