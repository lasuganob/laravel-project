
<a href="{{ route(role_prefix() . '.posts.show', $post) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-search"></i></a>

@can('update', $post)
    <a href="{{ route(role_prefix() . '.posts.edit', $post) }}" class="btn btn-sm btn-primary text-white"><i class="bi bi-pencil-square"></i></a>
@endcan

@can('delete', $post)
    <form method="POST" action="{{ route(role_prefix() . '.posts.destroy', $post) }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger text-white"><i class="bi bi-trash"></i></button>
    </form>
@endcan
