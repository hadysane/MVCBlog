@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">List Posts</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- List post -->
            <div class="card p-4 m-4 ">
                <h2 class="text-center"> List of Posts</h2>
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
                                <td>{{ $billet->id }}</td>
                                <td>{{ $billet->username }}</td>
                                <td>{{ $billet->title }}</td>
                                <td>{{ $billet->content }}</td>
                                <td>{{ $billet->tags }}</td>
                                <td>{{ $billet->created }}</td>
                                <td>{{ $billet->updated }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $billets->links(); !!}
            </div>
        </div>
    </div>
</div>

@endsection

