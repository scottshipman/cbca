@extends('layouts.main')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Membership</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('membership.index')
                }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('membership.update',$membership->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Membership Name:</strong>
                    <input type="text" name="name" value="{{  $membership->name }}"
                           class="form-control"
                           placeholder="Membership name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>Membership Price:</strong>
                        <input type="number" step="0.01" name="price"
                               value="{{ $membership->price }}" class="form-control"
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
                            <option value=0 @if ($membership->active==0)
                             selected @endif>Disabled</option>
                            <option value=1 @if ($membership->active==1)
                             selected @endif>Active</option>
                        </select>
                        @error('active')
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
                               name="start_date" id="start_date"
                               value="{{ $membership->start_date }}"/>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <strong>Membership End Date:</strong>
                        <input id="datepicker_end" type="date"
                               class="form-control"
                               name="end_date" id="end_date"
                               value="{{ $membership->end_date }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <hr>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('scripts')

@endsection