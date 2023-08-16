@extends('layouts.main')
@section('head')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Crystal Beach Members</h1>
    <a href="/page/create"><button class="btn btn-primary">Add New Page</button></a>
    <div class="container mt-5" style="background:white";>
        <table class="admin_table table-bordered page-datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>URL Path</th>
                <th>Published</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('.page-datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv',
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('page.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'page_type', name: 'page_type'},
                    {data: 'slug', name: 'slug'},
                    {data: 'published', name: 'published'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection