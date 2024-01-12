<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @include('components.alert')

    <style>
        body {
            margin: 0; 
            font-family: 'Arial', sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333; /* Add background color for the header */
            border-bottom: 2px solid #555; /* Add a border at the bottom for separation */
        }

        .navbar-logo {
            margin-right: 90%; /* Push the logo to the left */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-right: 15px; 
        }

        .nav-link {
            text-decoration: none;
            color: #fff; 
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease; 
        }

        .nav-link:hover {
            color: #007bff; 
        }
/* 
        .logout {
            margin-left: 90%; 
        } */

        .logout a {
            color: #fff; 
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease; 
        }

        .logout a:hover {
            color: #007bff; 
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <ul class="navbar-logo">
                <li>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="100px" height="100px" style="border-radius: 10px;">
                    </a>
                </li>
            </ul>
            <ul class="nav-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('report') }}">Report</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                <span style="margin-left: 600px; font-weight: bold; color: white; font-size: 18px;">Hello, {{ auth()->user()->name }}</span>
           
                <ul class="logout">
                    <li>
                        <a style="margin-left: 200px" class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                    </li>
                </ul>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>
    <!-- Add your JavaScript scripts or CDN links here -->

</body>
</html>
