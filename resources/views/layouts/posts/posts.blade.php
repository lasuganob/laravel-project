<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
    <a class="btn btn-primary me-md-2" type="button" href="{{ route(role_prefix() . '.posts.create') }}"><i class="bi bi-plus-circle-fill"></i> Add Post</a>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <table id="posts-table" class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#posts-table').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: @json($posts_url),  // Route defined in web.php
            dom: '<"wrapper"lf>rt<"wrapper"ip>',
            pageLength: 50,
            columns: [
                { data: 'title', name: 'title', className: 'title' },
                { data: 'user.name', name: 'user.name' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: false,
                    className: 'action-buttons'
                },
            ],
            language: {
                searchPlaceholder: "Search",
                search: "",
                lengthMenu: '<div class="length-options"><div>_MENU_</div> <span>Entries</span></div>'
            }
        });
    });
</script>
