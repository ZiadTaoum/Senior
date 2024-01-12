
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <header>
        <nav>
            <ul>
            <li>Admin</li>
            <li><a href="{{ route('items.index') }}">Items</a></li>
            <li><a href="{{ route('compare_items.index') }}">Compare</a></li>
                <li><a href="{{ route('adminReview.index') }}">Reviews</a></li>
            </ul>
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

</body>
</html>
