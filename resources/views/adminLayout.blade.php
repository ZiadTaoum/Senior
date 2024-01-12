
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style.css">
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
            <ul>
                <ul class="navbar-logo">
                    <li>
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="100px" height="100px" style="border-radius: 10px;">
                    </li>
                </ul>
                {{-- <li>{{ auth()->user()->name }}</li> --}}
            <li><a href="{{ route('items.index') }}">Items</a></li>
            <li><a href="{{ route('compare_items.index') }}">Compare</a></li>
                <li><a href="{{ route('adminReview.index') }}">Reviews</a></li>
            </ul>
            <ul class="logout">
                <li>
                    <a style="margin-left: 1200px" href="{{ route('logout') }}"
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

</body>
</html>
