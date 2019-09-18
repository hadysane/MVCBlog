@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card uper mt-3">
        <div class="card-header">
            <h1>Profile user</h1>
        </div>

        <div class="card-body">
            <h2> Your informations </h2>
            <div class="p-5">
                <h4>Username :</h4> <p> {{ $user->username }}</p>
                <h4>Name :</h4> <p> {{ $user->name }}</p>
                <h4>Lastame :</h4> <p> {{ $user->lastname }}</p>
                <h4>Birthdate :</h4> <p> {{ $user->birthdate }}</p>
                <h4>Email :</h4> <p> {{ $user->email }}</p>
                <h4>Inscription in :</h4> <p> {{ $user->created_at }}</p>
                <h4>Last update :</h4> <p> {{ $user->updated_at }}</p>

            </div>
            
        </div>
    </div>
   
</div>
@endsection