@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @if (session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            <a href="{{ url('/billet/new')}}" type="button" class="btn btn-primary btn-lg btn-block m-3">Add billet</a>
            @foreach ($billets as $billet)
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <a href=" {{route('billet.show', $billet->id)}}"> Title :  {{ $billet->title }} </a>
                                <p> Auteur : {{$billet->user->username}} </p>
                            </div>
                            @if (Auth::user()->id == $billet->user_id)
                            <div class="col-md-2">
                                <form action="{{ route('billet.edit', $billet->id) }}" method="get">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-secondary text-light my-3" type="submit">Edit</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <p>Created : {{$billet->created}}</p>
                        <div class="border border-secondary rounded p-3">
                            <h4>Content :</h4> 
                            <p> {{$billet->content}} </p>
                        </div> 

                        <div class="m-3">
                            <b>Tags :</b>
                            <p>{{$billet->tags}}</p>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                           <a href="{{route('billet.show', $billet->id)}}">  

                           @foreach($posts as $comment)
                            {{ $comment->comments_count }}
                           @endforeach 
                             Comments
                             </a>
                    </div>

                </div>
            </div>
            @endforeach

            <div class="text-center">
                {!! $billets->links(); !!}
            </div>
            
        </div>
    </div>

@endsection