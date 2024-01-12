
@extends('layout')

@section('title', 'About Found Items')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        ol, ul {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="section">
            <h1 style="color: orangered">About Found </h1>
            <p>Welcome to our Lost and Found platform, dedicated to reuniting lost items with their rightful owners. The "Found" section plays a crucial role in helping items find their way back home. Here's what you need to know:</p>
        </div>

        <div class="section">
            <h2 style="color: orangered">Our Mission</h2>
            <p>Our mission is to create a centralized hub for found items, making it easy for individuals to report and discover lost belongings. We believe in fostering a community that values honesty, compassion, and the joy of reuniting people with their cherished possessions.</p>
        </div>

        <div class="section">
            <h2 style="color: orangered">How It Works</h2>
            <p>Found an item? Great! Here's how you can contribute to the community:</p>
            <ol>
                <li><strong>Report:</strong> Use our simple reporting form to provide details about the found item.</li>
                <li><strong>Upload:</strong> Attach images or additional information to help identify the item.</li>
                <li><strong>Connect:</strong> Allow owners to reach out to you through our secure messaging system.</li>
            </ol>
        </div>

        <div class="section">
            <h2 style="color: orangered">Safety First</h2>
            <p>While our platform facilitates the return of lost items, we want to emphasize the importance of safety:</p>
            <ul>
                <li><strong>Meet in Public Places:</strong> If a meetup is required to return an item, choose a safe and public location.</li>
                <li><strong>Bring a Friend:</strong> If you must meet someone, consider bringing a friend or family member along.</li>
                <li><strong>Inform Others:</strong> Let someone know about your plans, including the time and location of the meetup.</li>
                <li><strong>Avoid Private Spaces:</strong> Never invite strangers or go to private spaces for exchanges.</li>
                <li><strong>Contact Authorities:</strong> If you feel uneasy or encounter suspicious behavior, contact local authorities immediately.</li>
            </ul>
        </div>

        <div class="section">
            <h2 style="color: orangered">Contact Us</h2>
            <p>Have questions or suggestions? We'd love to hear from you! Contact our support team <a href="mailto:support@lostfound.com">via email</a>.</p>
        </div>
    </div>
@endsection
