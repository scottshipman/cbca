@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Memberships</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('membership.create')
                }}">
                    Create Membership</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="admin_table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Membership Name</th>
            <th>Membership Active</th>
            <th>Membership Price</th>
            <th>Membership Start</th>
            <th>Membership End</th>
            <th Membership="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($memberships as $membership)
            <tr>
                <td>{{ $membership->id }}</td>
                <td>{{ $membership->name }}</td>
                <td>{{ $membership->active }}</td>
                <td>${{ $membership->price }}</td>
                <td>{{ $membership->start_date }}</td>
                <td>{{ $membership->end_date }}</td>
                <td>
                    <form action="{{ route('membership.destroy',$membership->id) }}"
                          method="Post">
                        <a class="btn btn-primary" href="{{ route('membership.edit',
                        $membership->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $memberships->links() !!}
</div>
@endsection