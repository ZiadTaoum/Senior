@extends('layout')

@section('title', 'Delete Review')

@section('content')
    <div class="container">
        <h2>Delete Review</h2>

        @if (isset($review))
            <p>Are you sure you want to delete the following review?</p>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Review Content</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->review_content }}</td>
                    </tr>
                </tbody>
            </table>

            <form method="post" action="{{ route('reviews.destroy', $review) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Confirm Delete</button>
            </form>

            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
        @else
            <p>Review not found.</p>
        @endif
    </div>
@endsection