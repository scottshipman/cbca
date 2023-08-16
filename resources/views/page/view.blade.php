@extends('/layouts/main')

@section('head')
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @else
        <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    @endif
        @if($page->meta_keywords) <meta name=""keywords" content="{{ $page->meta_keywords }}"> @endif
    <title>{{ $page->title }} - Crystal Beach Community Association</title>
@endsection

@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">{{ $page->title }}</h1>

    <style type="text/css">
        {!! $page->css !!}
    </style>

    {!! $page->html !!}
@endsection


@section('scripts')
@endsection