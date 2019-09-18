@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">Home Admin</h1>
    <div class="row justify-content-center">

        <div class="col-md-12">
            <!-- Last users -->
            <div class="card p-4 m-4 ">
                <h2 class="text-center"> List 10 of last users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Lastame</th>
                            <th>Birthdate</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Last post -->
            <div class="card p-4 m-4 ">
                <h2 class="text-center"> List 10 of last Posts</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Tags</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($billets as $billet)
                            <tr>
                                <td>{{$billet->id}}</td>
                                <td> {{ $billet->username }}</td>
                                <td>{{$billet->title}}</td>
                                <td>{{$billet->content}}</td>
                                <td>{{$billet->tags}}</td>
                                <td>{{$billet->created }}</td>
                                <td>{{$billet->updated }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Last Comments -->
            <div class="card p-4 m-4 ">
                <h2 class="text-center"> List 10 of last Comments</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title post</th>
                            <th>Written by </th>
                            <th>Comment</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->title }}</td>
                                <td>{{ $comment->username }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

