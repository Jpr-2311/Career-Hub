<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>CareerHub | Job & Recruitment Platform</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .navbar {
            min-height: 70px;
        }

        .nav-link {
            font-weight: 600;
            margin-left: 8px;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            opacity: 0.75;
        }

        .navbar-brand:hover {
            text-decoration: none;
        }

        main {
            min-height: calc(100vh - 70px);
        }
    </style>
</head>

<body>

    <div id="app">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    CareerHub
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                Home
                            </a>
                        </li>

                        @if (Route::has('jobs.index'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs.index') }}">
                                Jobs
                            </a>
                        </li>
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->

                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        @if (Route::has('register'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>

                        @endif

                        @else

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                v-pre>

                                {{ Auth::user()->name }}

                            </a>

                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown">

                                <a class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">

                                    {{ __('Logout') }}

                                </a>

                                <form id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    class="d-none">

                                    @csrf

                                </form>

                            </div>

                        </li>

                        @endguest

                    </ul>

                </div>

            </div>

        </nav>

        <!-- Main Content -->
        <main class="py-4">

            @yield('content')

        </main>

    </div>

</body>

</html>