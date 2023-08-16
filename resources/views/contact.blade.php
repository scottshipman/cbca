@extends('/layouts/main')
@section('head')
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    <title>Contact - Crystal Beach Community Association</title>
@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var(--bs-primary);">Contact CBCA Board</h1>
    <div class="container bkg-overlay">
        <section class="page-section clearfix">

                <div id="contact-us-wrapper" class="container mt-5">
                    <!-- Success message -->
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form action="" method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                            <!-- Error -->
                            @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                            @if ($errors->has('email'))
                                <div class="error">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                            @if ($errors->has('phone'))
                                <div class="error">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                                   id="subject">
                            @if ($errors->has('subject'))
                                <div class="error">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                                      rows="4"></textarea>
                            @if ($errors->has('message'))
                                <div class="error">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                        </div>
                        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                    </form>
                </div>
        </section>
    </div>d
@endsection

