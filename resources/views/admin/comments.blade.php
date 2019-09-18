@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">List of comments</h1>
    <div class="row justify-content-center">

        <div class="col-md-12">
           <!-- Last Comments -->
           <div class="card p-4 m-4 ">
                <h2 class="text-center"> Comments</h2>
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
            <div class="text-center">
                {!! $comments->links(); !!}
            </div>
        </div>
    </div>
</div>

@endsection

