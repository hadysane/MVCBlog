@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            @if (session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <p> Title :  {{$billet->title}} </p>
                                <p> Auteur : {{$billet->user->username}} </p>
                            </div>
                            @if (Auth::user()->id == $billet->user_id)
                            <div class="col-md-2">
                                <form action="{{ route('billet.edit', $billet->id ) }}" method="get">
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
                </div>

                <div class="card m-3">
                    <div class="card-header">
                        Comment
                    </div>
                    <div class="card-body">

                        <form action="{{route('comment.store', $billet->id ) }}" method="post">
                            @csrf
                            @method('POST')
                            <h5 class="card-title">Comment</h5>
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="register">
                        </form>

                    </div>
                </div>

                @foreach($billet->comments as $comment)

                    <div class="card m-3">
                        <div class="card-header">
                        Comment
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user->username }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                        </div>
                        <div class="card-footer text-muted">
                           Comment at :  {{ $comment->created_at }}
                        </div>
                    </div>

                @endforeach

                <a href="{{route('billet.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>
@endsection