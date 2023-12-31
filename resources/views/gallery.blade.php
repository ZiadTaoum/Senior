@extends('layout')

@section('title', 'Gallery')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Found Items Gallery</h1>

        <div class="card-grid">
            @foreach ($foundItems as $foundItem)
                <div class="card">
                    <img src="{{ asset('storage/'.$foundItem->image->image_url) }}" alt="Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foundItem->item_name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $foundItem->id }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $foundItem->status }}</p>
                        <p class="card-text"><strong>User:</strong> {{ $foundItem->user->name }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $foundItem->address->city }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $foundItem->category->category_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $foundItems->links('pagination::bootstrap-5') }}
    </div>

    <style>
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
