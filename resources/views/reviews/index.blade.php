@extends('layout')
<link rel="stylesheet" href="{{ asset('style.css') }}">
@section('title', 'Reviews')

@section('content')
    <div class="container">
        <h2>All Reviews</h2>
        <button onclick="window.location.href='{{ url('/reviews/create') }}'">Add a Review</button>

        <!-- Search Bar -->
        <input type="text" id="searchInput" placeholder="Search by User">

        @if ($reviews && count($reviews) > 0)
            <table class="table" id="reviewsTable">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Review Content</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr class="reviewRow">
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->review_content }}</td>
                            <td>
                                @if (auth()->user()->id === $review->user->id || auth()->user()->role->name == 'admin')
                                    <a href="{{ route('reviews.edit', $review) }}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{ route('reviews.destroy', $review) }}" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @else
                                    <!-- Display a message or handle as per your requirement -->
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $reviews->links('pagination::bootstrap-5') }}
            </div>

        @else
            <p>No reviews available.</p>
        @endif
    </div>


    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                filterReviews(searchTerm);
            });

            function filterReviews(searchTerm) {
                const reviewRows = document.querySelectorAll('.reviewRow');

                reviewRows.forEach(function (row) {
                    const userName = row.querySelector('td:first-child').textContent.toLowerCase();
                    const isVisible = userName.includes(searchTerm);

                    row.style.display = isVisible ? 'table-row' : 'none';
                });
            }
        });
    </script>
@endsection
