@extends('layouts.main')
@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Page: {{ $page->title }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('page.list')
                }}" enctype="multipart/form-data">
                        Back to Page List</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('page.edit-save',$page->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Page Title:</strong>
                        <input type="text" name="title" value="{{  $page->title }}"
                               class="form-control"
                               placeholder="Page Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-5 col-sm-5 col-md-5">

                        <strong>Page Url Path:</strong>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ request()->getSchemeAndHttpHost() }}/content/</span>
                            </div>
                            <input type="text" name="slug" id="slug"
                                   value="{{ $page->slug }}" class="form-control"
                                   placeholder="Page Url Path">
                            @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Page Type:</strong>
                            <select class="form-control" name="page_type" id="page_type">
                                <option value='info' @if ($page->page_type=='info')
                                selected @endif>Info</option>
                                <option value='form' @if ($page->page_type=='form')
                                selected @endif>Form</option>
                                <option value='form_payment' @if ($page->page_type=='form_payment')
                                selected @endif>Form with Payment</option>
                            </select>
                            @error('page_type')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Published:</strong>
                            <select class="form-control" name="published" id="published">
                                <option value=1 @if ($page->published==1)
                                selected @endif>Published</option>
                                <option value=0 @if ($page->published==0)
                                selected @endif>Draft</option>
                            </select>
                            @error('published')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Page Meta-keywords (comma separated list):</strong>
                        <input type="text" name="meta_keywords" value="{{  $page->meta_keywords }}"
                               class="form-control"
                               placeholder="Page Meta Keywords">
                        @error('meta_keywords')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Page Meta-Description:</strong>
                        <input type="text" name="meta_description" value="{{  $page->meta_description }}"
                               class="form-control"
                               placeholder="Page Meta Description">
                        @error('meta_description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Background Image:</strong>
                    <div class="form-group">
                        <input type="file" name="image" value="{{ $page->image_path }}"
                               class="form-control"
                               placeholder="Background Image">
                        @if($page->image_path)
                            <div class="card w-25 text-black">
                                <h5>Current Image:</h5>
                                <span>Download: <a target="_blank" href="{{asset('storage/pages/'. $page->image_path) }}">{{$page->image_path}}</a></span><br>
                                <img src="{{asset('storage/pages/'. $page->image_path) }}" max-width="75px" max-height="75px">
                            </div>
                        @endif
                        @error('image')

                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <hr>
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </div>

                <hr>

                <h4>Page Design:</h4>
                <iframe class="designer" src="/page/design/{{ $page->id }}"></iframe>
            </div>
        </form>
    </div>

@endsection
@section('scripts')

@endsection