<!-- resources/views/example/index.blade.php -->
@extends('adminLayout')

@section('content')

<style>
    .item-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .item-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .item-image {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .item-details {
        font-size: 14px;
    }
</style>
    <h1>Lost Items</h1>

    <div class="item-grid">
        @foreach ($lostItems as $lostItem)
            <div class="item-card">
                <img src="{{ asset('storage/'.$lostItem->image->image_url) }}" alt="Image" class="item-image">
                <div class="item-details">
                    <p><strong>ID:</strong> {{ $lostItem->id }}</p>
                    <p><strong>Item Name:</strong> {{ $lostItem->item_name }}</p>
                    <p><strong>Status:</strong> {{ $lostItem->status }}</p>
                    <p><strong>User:</strong> {{ $lostItem->user->name }}</p>
                    <p><strong>Address:</strong> {{ $lostItem->address->city }}</p>
                    <p><strong>Category:</strong> {{ $lostItem->category->category_name }}</p>
                    <p><strong>Reward:</strong> {{ $lostItem->reward ? $lostItem->reward->reward_description : 'N/A' }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{ $lostItems->links('pagination::bootstrap-5') }}

    <h1>Found Items</h1>

    <div class="item-grid">
        @foreach ($foundItems as $foundItem)
            <div class="item-card">
                <img src="{{ asset('storage/'.$foundItem->image->image_url) }}" alt="Image" class="item-image">
                <div class="item-details">
                    <p><strong>ID:</strong> {{ $foundItem->id }}</p>
                    <p><strong>Item Name:</strong> {{ $foundItem->item_name }}</p>
                    <p><strong>Status:</strong> {{ $foundItem->status }}</p>
                    <p><strong>User:</strong> {{ $foundItem->user->name }}</p>
                    <p><strong>Address:</strong> {{ $foundItem->address->city }}</p>
                    <p><strong>Category:</strong> {{ $foundItem->category->category_name }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{ $foundItems->links('pagination::bootstrap-5') }}
@endsection
