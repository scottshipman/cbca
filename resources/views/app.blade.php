<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Crystal Beach Community Association</title>
    <meta name="description" content="Between historic Tarpon Springs and Ozona sits Crystal Beach, a beautiful waterfront community. Our town, which hugs the Gulf of Mexico, is quaint, quiet and close-knit.">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
<h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">Crystal Beach Community Association</span><span class="site-heading-lower">Crystal Beach, FL</span></h1>
<div class="dropdown member-button">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        For Members
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="/login">Login</a></li>
        <li><a class="dropdown-item" href="/register">Register</a></li>
    </ul>
</div>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-lg-4" id="mainNav">
    <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Crystal Beach Community Association</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
            </ul>
        </div>
    </div>
</nav>
@inertia


<footer class="text-center footer text-faded py-5">
    <div class="container">
        <p class="m-0 small">Copyright&nbsp;©&nbsp;Crystal Beach Community Association 2023</p>
    </div>
</footer>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bs-init.js"></script>
<script src="/js/current-day.js"></script>
</body>