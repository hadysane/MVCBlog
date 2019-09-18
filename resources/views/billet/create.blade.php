@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New billet</div>
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

                        <form action="{{ route('billet.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label class="font-weight-bold" for="title">Title</label>
                                <input class="form-control form-control-lg" name="title" type="text" placeholder=" ">
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold" for="content">Content</label>
                                <textarea class="form-control" type="text" id="content" rows="5" name="content"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="font-weight-bold">Tags</label>
                                <input type="text" name="tags" class="form-control">
                            </div>

                            <input type="submit" value="Publish" class="text-light btn btn-info btn-lg btn-block mt-4">
                        </form>
                    <div>
                </div>
            </div>
    </div>
</div>


@endsection