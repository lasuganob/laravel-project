<form wire:submit="save">
    <div data-mdb-input-init class="form-outline mt-3 mb-3" data-mdb-input-init>
        <input type="text" wire:model="form.title" class="form-control form-control-lg {{ $mode == 2 ? 'active' : '' }}" id="title">
        <label for="title" class="form-label">Post Title</label>
        <div>
            @error('form.title') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div data-mdb-input-init class="form-outline mb-3">
        <textarea wire:model="form.content" class="form-control {{ $mode == 2 ? 'active' : '' }}" id="content" rows="5"></textarea>
        <label for="content" class="form-label">Post Content</label>
        <div>
            @error('form.content') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-check form-switch mb-3">
        <input type="checkbox" wire:model="form.status" class="form-check-input" id="status" value="1" {{ $mode == 2 && $post->status == 1 ? 'checked' : '' }}>
        <label for="status" class="form-check-label">Show post to all users</label>
    </div>

    <button data-mdb-ripple-init type="submit" class="btn btn-primary">Save Post</button>
</form>
