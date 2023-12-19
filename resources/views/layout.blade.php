<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add your CSS stylesheets or CDN links here -->
    <style>
        /* Add your custom styles here */


        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: lightgray;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 30px 20px; /* Increased padding for better spacing */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 16px; /* Increased font size */
    padding: 12px 15px; /* Increased padding for better spacing */
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #555;
}

.logout {
    margin-left: 260%; /* Push the logout button to the right */
}

.logout a {
    padding: 12px 15px; /* Increased padding for better spacing */
    border-radius: 5px;
    background-color: orangered;
    color: #fff;
    text-decoration: none;
    transition: background-color 1s;
}

.logout a:hover {
    background-color: black;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}
    </style>
</head>
<body>

    <header>
        <nav>
            <ul>
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
