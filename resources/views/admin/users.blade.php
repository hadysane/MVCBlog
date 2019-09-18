@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">List Users</h1>
    <div class="row justify-content-center">

        <div class="col-md-12">
            <!-- List users -->
            <div class="card p-4 m-4 ">
                <h2 class="text-center"> List of users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Lastame</th>
                            <th>Birthdate</th>
                            <th>Role</th>
                            <th>Update Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->birthdate}}</td>
                                <td>{{$user->roleName}}</td>
                                <td>
                                    <form action="{{route('admin.updateUsers', $user->id)}}">
                                        <label for="role_id">Select role</label>
                                        <select class="form-control" id="role_id">
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id}}"> {{ $role->name }}</option>
                                            @endforeach
                                        </select>

                                        <input type="submit" class="btn btn-info m-3" value="update">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $users->links(); !!}
            </div>
        </div>
    </div>
</div>

@endsection

