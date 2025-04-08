@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Post</h1>

                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5">{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
