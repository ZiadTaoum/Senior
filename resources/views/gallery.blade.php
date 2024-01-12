<!-- resources/views/gallery.blade.php -->

@extends('layout')

@section('title', 'Gallery')

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

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 15px;
        }
    </style>

    <div class="container mt-5">
        <h1 class="mb-4">Found Items Gallery</h1>

        <div class="card-grid">
            @foreach ($foundItems as $foundItem)
                <div class="card">
                    <img src="{{ asset('storage/'.$foundItem->image->image_url) }}" alt="Image" class="card-img-top" style="height: 200px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foundItem->item_name }}</h5>
                        <p class="card-text"><strong>Status:</strong> {{ $foundItem->status }}</p>
                        <p class="card-text"><strong>User:</strong> {{ $foundItem->user->email }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $foundItem->address->city }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $foundItem->category->category_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $foundItems->links('pagination::bootstrap-5') }}
    </div>
@endsection
