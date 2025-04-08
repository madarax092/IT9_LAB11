@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post->title }}</h1>
                <div class="mb-3">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>

                <div class="card">
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
