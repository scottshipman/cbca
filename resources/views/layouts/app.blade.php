<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Crystal Beach Community Association</title>
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="/css/fontawesome/fontawesome.css" rel="stylesheet">
    <link href="/css/fontawesome/solid.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body class="font-sans text-gray-900 antialiased"
      style="background-image: url('/images/pier-daytime.jpg');
            background-size:cover; background-repeat: no-repeat;">
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
            </ul>

        </div>
    </div>
</nav>




    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') ||
Auth::user()->hasRole('board'))
        <div class="row">
            <div id="admin_nav" class="col-2">
                @include ('layouts.admin_nav')
            </div>
            <div id="admin_content" class="col-10">
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    @endif


<footer class="text-center footer text-faded py-5">
    <div class="container">
        <p class="m-0 small">Copyright&nbsp;©&nbsp;Crystal Beach Community Association 2023</p>
    </div>
</footer>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/fontawesome.min.js"></script>
<script src="/js/solid.min.js"></script>
<script src="/js/bs-init.js"></script>
<script src="/js/current-day.js"></script>

</body>
</html>
