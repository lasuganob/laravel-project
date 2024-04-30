@extends('posts.layout')

@section('content')
    <a type="button" class="btn btn-info mt-3 mb-3 text-white" href="{{ route(role_prefix().'.posts.index') }}">Back to posts</a>
    <div class="card mt-5">
        <h3 class="card-header">Edit Post</h3>
        <div class="card-body">
            {{-- @livewire('edit-post', ['post' => $post]) --}}
            <form action="{{ route(role_prefix() . '.posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <div data-mdb-input-init class="form-outline mt-3 mb-3" data-mdb-input-init>
                    <input type="text" class="form-control form-control-lg" id="title" name="title" value={{ $post->title }}>
                    <label for="title" class="form-label">Post Title</label>
                    <div>
                        @error('title') <small class="error text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-3">
                    <textarea class="form-control id="content" rows="5" name="content">{{ $post->content }}</textarea>
                    <label for="content" class="form-label">Post Content</label>
                    <div>
                        @error('content') <small class="error text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" id="status" value="1" name="status" {{ $post->status == 1 ? "checked" : "" }}>
                    <label for="status" class="form-check-label">Show post to all users</label>
                    <div>
                        @error('status') <small class="error text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <button data-mdb-ripple-init type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
@endsection
