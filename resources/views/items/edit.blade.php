@extends('adminLayout')

@section('title', 'ADMIN')

@section('content')

<div>
    <h1>Edit Item</h1>

    <form method="post" action="{{ route('items.update', ['item' => $item->id]) }}">
        @csrf
        @method('PUT')

        <!-- Add your form fields for editing item details here -->
        <!-- For example, if you want to edit the item name -->
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" value="{{ $item->item_name }}" required>

        <!-- Add other fields as needed -->

        <button type="submit">Update Item</button>
    </form>

    <form method="post" action="{{ route('items.destroy', ['item' => $item->id]) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
        @csrf
        @method('DELETE')

        <button type="submit">Delete Item</button>
    </form>
</div>

@endsection
