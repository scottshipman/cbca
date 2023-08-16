@extends('layouts.main')
@section('head')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Crystal Beach Members</h1>
    <div class="container mt-5" style="background:white";>
        <table class="admin_table table-bordered member-datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Membership</th>
                <th>Address</th>
                <th>Phone</th>
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

            var table = $('.member-datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv',
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('member.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'memberships', name: 'memberships'},
                    {data: 'address1', name: 'address1'},
                    {data: 'phone', name: 'phone'},
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