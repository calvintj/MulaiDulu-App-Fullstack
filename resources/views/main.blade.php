<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    @yield('head')
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" style="width: 100px; height: auto;">
            </a>

            <!-- Toggler Button for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ourWorks">Our Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mentorship">Mentorship</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                </ul>

                <!-- Cart Link -->
                <ul class="navbar-nav me-3">

                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('cart.view') }}">
                            <i class="bi bi-cart-check"></i> Cart
                            @php
                                $cartCount = session('cart') ? count(session('cart')) : 0;
                            @endphp
                            @if ($cartCount > 0)
                                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>

                <!-- Authentication Links -->
                <div class="d-flex">
                    @if (Route::has('login') && Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light me-2">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    @elseif (Route::has('login') && !Auth::check())
                        <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-light" href="{{ route('register') }}">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>



    @yield('content')

    <footer class="bg-dark text-white text-center py-3">
        <p>© 2024 MulaiDulu. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
