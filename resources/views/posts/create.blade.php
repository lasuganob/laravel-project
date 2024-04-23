@extends('posts.layout')

@section('content')
    <a type="button" class="btn btn-info mt-3 mb-3 text-white" href="{{ route(role_prefix().'.posts.index') }}">Back to posts</a>
    <div class="card mt-5">
        <h3 class="card-header">Add Post</h3>
        <div class="card-body">
            @livewire('create-post')
        </div>
    </div>
@endsection
