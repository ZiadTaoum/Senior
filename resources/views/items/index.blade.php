@extends('adminLayout')

@section('title', 'ADMIN')

@section('content')

<style>
    .table-container {
        display: flex;
        overflow-x: auto;
    }

    .lost,
    .found {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        margin-right: 20px;
        flex: 0 0 auto; /* Prevent items from growing to fill free space */
    }

    .found {
        margin-right: 0;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin-right: 10px;
    }

    .pagination a {
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        color: #333;
    }

    .pagination .active a {
        background-color: #007bff;
        color: #fff;
    }
</style>

<div class="table-container">
    <div class="lost">
        <h1>Lost items</h1>

        <table border="10px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Date Lost</th>
                    <th>Color</th>
                    <th>Model</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lostItems as $lostItem)
                    <tr>
                        <td>{{ $lostItem->id }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$lostItem->image->image_url) }}" alt="Image" width="200px" height="200px">
                        </td>
                        @if(isset($lostItemDescriptions[$lostItem->id]))
                            <td>{{ $lostItemDescriptions[$lostItem->id]->category }}</td>
                            <td>{{ $lostItemDescriptions[$lostItem->id]->date_lost }}</td>
                            <td>{{ $lostItemDescriptions[$lostItem->id]->color }}</td>
                            <td>{{ $lostItemDescriptions[$lostItem->id]->model }}</td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $lostItems->links('pagination::bootstrap-5') }}
    </div>

    <div class="found">
        <h1>Found items</h1>

        <table border="10px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Date Found</th>
                    <th>Color</th>
                    <th>Model</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foundItems as $foundItem)
                    <tr>
                        <td>{{ $foundItem->id }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$foundItem->image->image_url) }}" alt="Image" width="200px" height="200px">
                        </td>
                        @if(isset($foundItemDescriptions[$foundItem->id]))
                            <td>{{ $foundItemDescriptions[$foundItem->id]->category }}</td>
                            <td>{{ $foundItemDescriptions[$foundItem->id]->date_found }}</td>
                            <td>{{ $foundItemDescriptions[$foundItem->id]->color }}</td>
                            <td>{{ $foundItemDescriptions[$foundItem->id]->model }}</td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $foundItems->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection