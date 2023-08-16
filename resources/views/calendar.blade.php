@extends('/layouts/main')
@section('head')
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    <title>Calendar - Crystal Beach Community Association</title>
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Crystal Beach Events Calendar</h1>
    <section class="page-section clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    {{-- info@crystalbeach.org google calendar--}}
                    <iframe id="cbca-calendar" src="https://calendar.google.com/calendar/embed?src=c_142q7al48knmm2has4b0hdbna4%40group.calendar.google.com&ctz=America%2FNew_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

