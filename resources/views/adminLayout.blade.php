<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add your CSS stylesheets or CDN links here -->
    
</head>
<body>

    <header>
        <nav>
            <ul>
            <li><a href="{{ route('items.index') }}">Items</a></li>
                 <li><a href="{{ route('adminReview.index') }}">Reviews</a></li>
               {{-- <li><a href="{{ route('report') }}">Report</a></li>
                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li> --}}
            </ul>
        </nav>
    </header>


    <div>
        @yield('content')
    </div>
    <!-- Add your JavaScript scripts or CDN links here -->

</body>
</html>
