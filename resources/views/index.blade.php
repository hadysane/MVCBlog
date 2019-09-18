@extends('layouts.app')

@section('content')
    @guest
        @include('auth.login')
    @else 
        @include('home')

    @endif
    
@endsection