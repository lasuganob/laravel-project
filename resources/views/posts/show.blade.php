@extends('posts.layout')

@section('content')
    <a type="button" class="btn btn-info mt-3 mb-3 text-white" href="{{ route(role_prefix().'.posts.index') }}">Back to posts</a>
    <div class="row gx-5 mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="mb-2"><strong>{{ $post->title }}</strong></h4>
            <span class="badge text-bg-secondary mb-4">{{ $post->user->name }}</span>
            <small>{{ $posted_at }}</small>

            <p class="text-muted">
                {{ $post->content }}
            </p>
        </div>
    </div>

    @can('update', $post)
        <a href="{{ route(role_prefix() . '.posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
    @endcan
    @can('delete', $post)
        <form method="POST" action="{{ route(role_prefix() . '.posts.destroy', $post) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    @endcan

@endsection
