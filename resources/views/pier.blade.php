@extends('/layouts/main')
@section('head')
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    <title>The Pier - Crystal Beach Community Association</title>
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">The Crystal Beach Pier</h1>
    <div class="container bkg-overlay">
        <section class="page-section cleafix">
            <h1 style="color: var(--bs-body-bg);font-size: 2.5vw;">You can watch some of the best sunsets at the pier!
            </h1>

            <p style="color: var(--bs-body-bg);">
                Below are some pictures of the pier and the Crystal Beach shoreline.
            </p>
        </section>
        <section class="page-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col"><img class="img-fluid"
                                          data-bss-hover-animate="pulse"
                                          src="/images/P1016841.jpg"
                                          alt="Crystal Beach Pier"></div>
                    <div class="col"><img class="img-fluid"
                                          data-bss-hover-animate="pulse"
                                          src="/images/P1016844.jpg"
                                          alt="Crystal Beach Pier"></div>
                    <div class="col"><img class="img-fluid"
                                          data-bss-hover-animate="pulse"
                                          src="/images/P1017001.jpg"
                                          alt="another pier sunset"></div>
                </div>
            </div>
        </section>
    </div>
@endsection

