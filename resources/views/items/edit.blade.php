@extends('adminLayout')

@section('title', 'Edit Item')

@section('content')

<style>
    /* Add any specific styles for your edit form if needed */
</style>

<div class="container mt-5">
    <h1>Edit Item</h1>

    @if(isset($lostItem))
        <form action="{{ route('admin.updateLostItem', ['id' => $lostItem->id]) }}" method="POST">
    @elseif(isset($foundItem))
        <form action="{{ route('admin.updateFoundItem', ['id' => $foundItem->id]) }}" method="POST">
    @endif

        @csrf

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ isset($lostItem) ? $lostItem->category : $foundItem->category }}">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date {{ isset($lostItem) ? 'Lost' : 'Found' }}</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ isset($lostItem) ? $lostItem->date_lost : $foundItem->date_found }}">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="{{ isset($lostItem) ? $lostItem->color : $foundItem->color }}">
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ isset($lostItem) ? $lostItem->model : $foundItem->model }}">
        </div>

        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
