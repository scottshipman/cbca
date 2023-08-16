@php
if(!isset($background)) {$background = "boards.jpg";}

@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="/css/fontawesome/fontawesome.css" rel="stylesheet">
    <link href="/css/fontawesome/solid.css" rel="stylesheet">
    @yield('head')
</head>

<body style="background-image: url('/images/{{$background}}');
        background-size:cover; background-repeat: no-repeat;">
{{-- linear-gradient(180deg, #049ef4 3%, transparent 18%, transparent 34%, #049ef4 58%),--}}
<h1 class="text-center text-white d-none d-lg-block site-heading">
    <span class="text-primary site-heading-upper mb-3">Crystal Beach Community Association</span>
    <span class="site-heading-lower">Crystal Beach, FL</span>
</h1>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-lg-4" id="mainNav">
    <div class="container small"><a class="navbar-brand text-uppercase
    d-lg-none text-expanded" href="#">Crystal Beach Community Association</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="/live-oak-park">Live Oak Park</a></li>
                <li class="nav-item"><a class="nav-link" href="/pier">The Pier</a></li>
                <li class="nav-item"><a class="nav-link" href="/cbca">CBCA</a></li>
                <li class="nav-item"><a class="nav-link" href="/cbce">CBCE</a></li>
                <li class="nav-item"><a class="nav-link" href="/calendar">Calendar</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                @if(!Auth::check())
                    <div class="dropdown member-button">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> Members
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/login">Login</a></li>
                            <li><a class="dropdown-item" href="/register">Register</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown member-button">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif

            </ul>

        </div>
    </div>
</nav>
    @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') ||Auth::user()->hasRole('board')))
    <div class="row">
        <div id="admin_nav" class="col-2">
            @include ('layouts.admin_nav')
        </div>
        <div id="admin_content" class="col-10">
            @yield('content')
        </div>
    </div>
    @else
    @yield('content')
    @endif

<footer class="text-center footer text-faded py-5">
    <div class="container">
        <p class="m-0 small">Copyright&nbsp;©&nbsp;Crystal Beach Community Association 2023</p>
    </div>
</footer>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/fontawesome.min.js"></script>
<script src="/js/solid.min.js"></script>
<script src="/js/bs-init.js"></script>
<script src="/js/current-day.js"></script>
@yield('scripts')
</body>

</html>