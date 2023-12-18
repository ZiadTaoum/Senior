@extends('layout')

@section('title', 'Home')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>

</head>
<div class="reminder">
    <p>
        Before you start, we recommend visiting our <a href="{{ url('/about') }}">About</a> page to learn more about our platform and safety guidelines.
    </p>
</div>

    <div class="Left_part">
        <h2>FOUND!</h2>
        <h4>Your items are lost, but not forgotten</h4>
        <p>Searching for your missing items made easier today</p>

        <button class="button" onclick="window.location.href='{{ url('/report') }}'">Start Your Search</button>

        <div class="img">
            <img src="{{ asset('images\aaaa.png') }}" alt="LAF-logo" width=200px height=200px >    
        </div>
    </div>

    <div class="middle_part">
        <h4>What’s better than a reunion with your stuff? </h4>
        <p>
            Nothing, so what are you waiting for, start your searching journey, and we will be there for you, giving you directions to reach your goal.
        </p>

        <img src="{{ asset('images\aaaa.png') }}" alt="LAF-logo" width=200px height=200px >    

        <button onclick="window.location.href='{{ url('/founditem/create') }}'">Report a Found Item</button>

        
    </div>

    <div class="last_part">
        <h3>What once was lost, now is found </h3>
        <p>
            But it’s also important to tell us more about your experience here, so we recommend leaving feedback concerning your adventure!
        </p>

        <button onclick="window.location.href='{{ url('/reviews/create') }}'">Leave A Review</button>
    </div>
</body>
</html>

@endsection

