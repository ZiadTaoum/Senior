@extends('adminLayout')
<link rel="stylesheet" href="{{ asset('style.css') }}">
@section('title', 'Edit Review')

@section('content')
    <div class="container">
        <h2>Edit Review</h2>

        <form method="post" action="{{ route('reviews.update', $review) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="review_content">Review Content:</label>
                <textarea name="review_content" id="review_content" class="form-control" rows="4" required>{{ $review->review_content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Review</button>
        </form>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">Back </a>
    </div>
@endsection