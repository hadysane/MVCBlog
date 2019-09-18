@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if ( session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <p>{{ Auth::user()->name }},  you are logged in!</p> 

                        <a class="btn btn-info text-light" href="{{route('billet.index')}}"> Show billets </a>

                        <div class="m-4">
                            @if (Auth::user()->hasAnyRole('admin')) 
                             <h4>Lists :</h4>
                            <a class="btn btn-info text-light" href="{{route('admin.users')}}"> Show Users </a>
                            <a class="btn btn-info text-light" href="{{route('admin.billets')}}"> Show Billets </a>
                            <a class="btn btn-info text-light" href="{{route('admin.comments')}}"> Show Comments </a>
                            @endif
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
