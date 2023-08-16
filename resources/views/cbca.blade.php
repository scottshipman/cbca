@extends('/layouts/main')
@section('head')
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    <title>CBCA - Crystal Beach Community Association</title>
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Crystal Beach Community Association</h1>
    <div class="container bkg-overlay">
        <section class="page-section clearfix">
            <h1 style="color: var(--bs-body-bg);font-size: 2.5vw;">CBCA
                Purpose</h1>
            <p style="color: var(--bs-body-bg);">This corporation is
                organized for the purpose of providing recreational and
                social activities and promoting projects of a civic nature
                for the improvement and development of the Crystal Beach
                community. The CBCA is a membership driven community.
                Membership is open to all residence in and near Crystal Beach.
            </p>
        </section>
        <section class="page-section clearfix">
            <strong>
                Your membership entitles you to:
            </strong>
            <ul>
                <li>a discount card for local merchants</li>
                <li>Discounted rates on Crystal Beach Community Hall rental</li>
            </ul>
        </section>
        <section class="page-section clearfix">

        </section>
        <section class="page-section clearfix">
            <strong>
                Your membership and donations maintain our:
            </strong>
            <div class="row">
                <div class="col">
                    <ul>
                        <li>Iconic Crystal Beach Pier</li>
                        <li>Benches around Park and shoreline</li>
                        <li>Communications to Crystal Beachers</li>
                        <li>Beach at Gulf Shore Park</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li>Entrance sign to Crystal Beach</li>
                        <li>Community Hall</li>
                        <li>Support for fundraising community events</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="page-section clearfix">
            <div class="row justify-content-center">
                @if(!Auth::check() || !Auth::user()->isActiveMember())
                    <div class="col d-flex justify-content-center">
                        <button type="button" class="btn btn-primary">Become
                            A Member</button>
                    </div>
                @endif
                    <div class="col d-flex justify-content-center">
                        <button type="button" class="btn btn-primary">Donate</button>
                    </div>
            </div>
        </section>

    </div>
@endsection

