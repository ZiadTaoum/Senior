@extends('layout')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

@php
    // Check if the reminder has already been displayed
    $reminderDisplayed = isset($_COOKIE['reminder_displayed']);
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

    <div class="img">
        <img src="{{ asset('images/aaaa.png') }}" alt="LAF-logo" width=200px height=200px >    
    </div>
</div>

<div class="middle_part">
    <h4>What’s better than a reunion with your stuff? </h4>
    <p>
        Absolutely nothing! So why wait? Embark on your searching journey, and guess what? We're right there with you, ready to guide you every step of the way.
    </p>

    <img src="{{ asset('images/aaaa.png') }}" alt="LAF-logo" width=200px height=200px >    

    <button onclick="window.location.href='{{ url('/founditem/create') }}'">Report a Found Item</button>
</div>

<div class="last_part">
    <h3>What once was lost, now is found </h3>
    <p>
        Your adventure matters to us! Don't keep it to yourself—share your experience by leaving a review. We're all ears and thrilled to hear your unique story!
    </p>

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
