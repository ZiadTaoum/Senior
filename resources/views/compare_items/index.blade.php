@extends('adminLayout')

@section('content')

<style>
    body {
        background-color: rgb(255, 255, 255);
    }

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
        height: 150px; /* Set a fixed height for the images */
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .item-details {
        font-size: 14px;
    }

    .action-buttons {
        margin-top: 10px;
    }

    .action-buttons button {
        margin-right: 5px;
    }
</style>

<div class="container mt-5" style="background-color: #fff">
    <h1 class="mb-4">Unchecked LostFound Items</h1>

    <div class="item-grid">
        @foreach ($uncheckedItems as $item)
            <div class="item-card">
                @if ($item->lostItem)
                    <img src="{{ asset('storage/'.$item->lostItem->image->image_url) }}" alt="Image" class="item-image">
                    <div class="item-details">
                        <p><strong>Lost Item:</strong> {{ $item->lostItem->item_name }}</p>
                        <p><strong>User:</strong> {{ $item->lostItem->user->email }}</p>
                        <p><strong>Address:</strong> {{ $item->lostItem->address->city }}</p>
                        <p><strong>Category:</strong> {{ $item->lostItem->category->category_name }}</p>
                    </div>
                @endif

                @if ($item->foundItem)
                    <img src="{{ asset('storage/'.$item->foundItem->image->image_url) }}" alt="Image" class="item-image">
                    <div class="item-details">
                        <p><strong>Found Item:</strong> {{ $item->foundItem->item_name }}</p>
                        <p><strong>User:</strong> {{ $item->foundItem->user->email }}</p>
                        <p><strong>Address:</strong> {{ $item->foundItem->address->city }}</p>
                        <p><strong>Category:</strong> {{ $item->foundItem->category->category_name }}</p>
                    </div>
                @endif

                <!-- Display other relevant information -->
                <div class="action-buttons">
                    <form action="{{ route('compare_items.confirm', $item) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Confirm Match</button>
                    </form>
                    
                    <form action="{{ route('compare_items.unconfirm', $item) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Unconfirm</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $uncheckedItems->links() }}
    </div>
</div>
@endsection
