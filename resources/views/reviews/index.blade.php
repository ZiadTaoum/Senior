@extends('layout')
<link rel="stylesheet" href="{{ asset('style.css') }}">
@section('title', 'Reviews')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: orangered;
        text-align: center;
    }

    button {
        background-color: orangered;
        color: #fff;
        border: none;
        padding: 10px 15px;
        margin-bottom: 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: black;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    /* Pagination Styles */
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: black;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        color: #ccc;
    }

    /* Search Bar Styles */
    #searchInput {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    /* Button Group Styles */
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    /* Responsive Styles */
    @media (max-width: 600px) {
        .table th, .table td {
            font-size: 14px;
        }

        button {
            width: 100%;
        }
    }
</style>
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
