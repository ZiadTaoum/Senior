@extends('layout')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
    
            .reminder {
                background-color: orangered;
                color: #333;
                padding: 10px;
                margin: 10px 0;
            }
    
            .reminder a {
                color: #333;
                text-decoration: underline;
            }
    
            .Left_part,
            .middle_part,
            .last_part {
                background-color: #fff;
                padding: 20px;
                margin: 10px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

        
        .Left_part {
        position: relative;
        background-image: url('images/LostandFound (1).webp');
        background-size: cover;
        background-position: center;
        color: #fff;
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.4); /* Adjust the color and opacity as needed */
        z-index: 2; /* Adjust the z-index to control the overlay order */
        border-radius: 8px; /* Add border-radius for rounded corners */
    }

    .overlay-container {
        position: relative;
        z-index: 3; /* Set a higher z-index for the overlay container */
        padding: 20px; /* Add padding for spacing */
    }

    h2, h4, p, button {
        color: #fff;
        z-index: 4; 
    }

    button {
            background-color:orangered; /* Change to orange */
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: black; /* Darker shade on hover */
        }


    
            .img img {
                display: block;
                margin: 0 auto;
                border-radius: 8px;
            }
    
            @media (max-width: 768px) {
                .Left_part, .middle_part, .last_part {
                    margin: 10px 0;
                }
            }

            /* Carousel Styles */
    .carousel-inner {
        border-radius: 8px;
        overflow: hidden;
        max-height: 400px; 
    }

    .carousel-item {
        text-align: center;
        padding: 20px;
    }

    .carousel-image {
        width: 100%;
        max-height: 500px; 
        border-radius: 8px;
        object-fit: cover;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 50px;
        width: 50px;
        outline: black;
        background-size: 100%, 100%;
        border-radius: 50%;
        background-image: none;
    }

    .carousel-control-prev-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="%23000000" viewBox="0 0 8 8"%3E%3Cpath d="M7 1.41L5.59 0 1.58 4 5.59 8 7 6.59 3.41 4 7 1.41z"%3E%3C/path%3E%3C/svg%3E');
    }

    .carousel-control-next-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="%23000000" viewBox="0 0 8 8"%3E%3Cpath d="M1 1.41L2.41 0 7.42 4 2.41 8 1 6.59 4.59 4 1 1.41z"%3E%3C/path%3E%3C/svg%3E');
    }

    /* Additional Middle Part Styles */
    .middle_part {
        text-align: center;
    }

    .middle_part h4 {
        color: orangered; /* Set the color to your desired accent color */
    }

    .middle_part p {
        color: #555;
        font-size: 16px;
    }

    .middle_part img {
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .middle_part button {
        background-color: orangered;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin-top: 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .middle_part button:hover {
        background-color: black;
    }

     /* Additional Left Part Styles */
     .Left_part {
        position: relative;
        background-image: url('images/LostandFound (1).webp');
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 40px; /* Increased padding for better spacing */
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 2;
        border-radius: 8px;
    }

    .overlay-container {
        position: relative;
        z-index: 3;
        padding: 20px;
    }

    .Left_part h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .Left_part h4 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .Left_part p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .Left_part button {
        background-color: orangered;
        color: #fff;
        border: none;
        padding: 15px 30px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .Left_part button:hover {
        background-color: black;
    }
        </style>
    </head>
<body>

@php
    // Check if the reminder has already been displayed
    // $reminderDisplayed = cookie()->has('reminder_displayed');
    $reminderDisplayed = isset($_COOKIE['reminder_displayed']);
    // Auth::id()
@endphp

@if(!$reminderDisplayed)
    <div class="reminder" id="reminder">
        <p>
            Hey there! 🌟 Ready to embark on a journey with us? Before you dive in, we recommend checking out our <a href="{{ url('/about') }}">About</a> page. It's packed with info about our platform and some essential safety guidelines.
        </p>
    </div>

    @php
        // Set a cookie to indicate that the reminder has been displayed
        setcookie('reminder_displayed', 'true', time() + (10 * 365 * 24 * 60 * 60)); // 10 years expiration
    @endphp
@endif

<div class="Left_part">
    <h2>FOUND!</h2>
    <h4>Your items are lost, but not forgotten</h4>
    <p>Hey there! Today's the day we make finding your missing items a breeze. Let's kick off your search!</p>

    <button class="button" onclick="window.location.href='{{ url('/report') }}'">Start Your Search</button>

    {{-- <div class="img">  
        <img src="{{ asset('images/aaaa.png') }}" alt="LAF-logo" width=200px height=200px >    
    </div> --}}
</div>


<div class="middle_part">
    <h4>What’s better than a reunion with your stuff?</h4>
    <p>
        Absolutely nothing! So why wait? Embark on your searching journey, and guess what? We're right there with you, ready to guide you every step of the way.
    </p>

    <img src="{{ asset('images/aaaa.png') }}" alt="LAF-logo" width="200px" height="200px">    

    <button onclick="window.location.href='{{ url('/founditem/create') }}'">Report a Found Item</button>
</div>

<div class="last_part">
    <h3 style="color: orangered">What once was lost, now is found</h3>
    <p>Your adventure matters to us! Don't keep it to yourself—share your experience by leaving a review. We're all ears and thrilled to hear your unique story!</p>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/th (1).jpeg') }}" class="d-block mx-auto carousel-image" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/th (2).jpeg') }}" class="d-block mx-auto carousel-image" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/th.jpeg') }}" class="d-block mx-auto carousel-image" alt="Slide 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->

    <button onclick="window.location.href='{{ url('/reviews/create') }}'">Leave A Review</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var reminder = document.getElementById('reminder');
        reminder.addEventListener('click', function () {
            // Toggle the visibility of the reminder by adding/removing the 'hidden' class
            reminder.classList.add('hidden');
        });
    });
</script>

</body>
</html>

@endsection
