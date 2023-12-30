@extends('layout')

@section('title', 'Gallery')

@section('content')
    <h1>Found Items</h1>

    <div class="card-deck mx-auto">
        @foreach ($foundItems as $foundItem)
            <div class="card mb-4">
                <img src="{{ asset('storage/'.$foundItem->image->image_url) }}" alt="Image" class="card-img-top">
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
@endsection
