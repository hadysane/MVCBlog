@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="container">
    <div class="card uper mt-3">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            <form method="post" action="{{ route('user.update', Auth::user()->id) }}" >
                    @csrf
                    @method('PATCH')


                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                </div>

                <div class="form-group">
                    <label for="lastname">Lastname :</label>
                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}"/>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate :</label>
                    <input type="date" class="form-control" name="birthdate" value="{{$user->birthdate}}"/>
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
                </div>

                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" name="password" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <div class="card uper mt-4">
        <div class="card-header">
                Delete User
        </div>
        <div class="card-body">
            <h3>Delete your account</h3>
               
            <form action="{{ route('user.destroy', Auth::user()->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection