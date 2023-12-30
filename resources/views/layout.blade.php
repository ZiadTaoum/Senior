<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style.css">
    @include('components.alert')

    <!-- Add your CSS stylesheets or CDN links here -->
    <style>
        body {
            margin: 0; /* Remove default body margin */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333; /* Add background color for the header */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .navbar-logo {
            margin-right: auto; /* Push the logo to the left */
        }

        nav ul li {
            margin-right: 20px;
        }

        .logout {
            margin-left: 200%   ; /* Push the logout button to the right */
        }

        .logout a {
            color: #fff; /* Change the color of the logout link */
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li class="navbar-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="100px" height="100px" style="border-radius: 10px;">
                    </a>
                </li>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('report') }}">Report</a></li>
                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
            </ul>
            <!-- Update the logout link -->
            <ul class="logout">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
            </ul>
            <!-- Add a form for logout with CSRF protection -->
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
