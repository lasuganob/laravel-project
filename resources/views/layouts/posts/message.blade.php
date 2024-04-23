@include('components.icons')

<div class="alerts mt-5">
    @if(session('success_add'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2 d-inline" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <span>{{ session('success_add') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('success_edit'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2 d-inline" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <span>{{ session('success_edit') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('success_delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2 d-inline" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <span>{{ session('success_delete') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<script>
    window.setTimeout(() => {
        $('.alert').fadeTo(500,0).slideUp(500, function() {
            $(this).remove();
        })
    }, 4000);
</script>
