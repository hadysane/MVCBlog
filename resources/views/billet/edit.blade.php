@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->id === $billet->user_id)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit billet</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br/>
                        @endif
                        <form action="{{ route('billet.update', $billet->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label class="font-weight-bold" for="title">Title</label>
                                <input type="text" class="form-control form-control-lg" name="title" value="{{ $billet->title }}" id="title">
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold" for="content">Content</label>
                                <textarea class="form-control" type="text" id="content" rows="5" name="content">{{ $billet->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="font-weight-bold">Tags</label>
                                <input type="text" name="tags" value="{{ $billet->tags }}" class="form-control">
                            </div>
                            <input type="submit" value="Update Post" class="text-light btn btn-info btn-lg btn-block mt-4">
                        </form>
                    <div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    Delete User
                </div>
                <div class="card-body">
                    <h3>Delete your account</h3>
                    
                    <form action="{{ route('billet.destroy', $billet->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @else 
        @include('user.noAccess')
    @endif
</div>
@endsection