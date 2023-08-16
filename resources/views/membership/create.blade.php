@extends('layouts.main')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-5 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Membership</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('membership.index')
                }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('membership.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Membership Name:</strong>
                    <input type="text" name="name" class="form-control"
                           placeholder="Membership Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Membership Price:</strong>
                    <input type="number" step="0.01" name="price" class="form-control"
                           placeholder="Membership Price">
                    @error('price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Membership Status:</strong>
                    <select class="form-control" name="active" id="active">
                        <option value=0>Disabled</option>
                        <option value=1>Active</option>
                    </select>
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <strong>Membership Start Date:</strong>
                        <input type="date" class="form-control"
                               name="start_date" id="start_date"/>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <strong>Membership End Date:</strong>
                        <input id="datepicker_end" type="date"
                               class="form-control"
                               name="end_date" id="end_date"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <hr>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>
</body>

@endsection
@section('scripts')

@endsection