<!-- resources/views/compare_items/index.blade.php -->

@extends('adminLayout')

@section('title', 'Comparison Results')

@section('content')
    <h1>Comparison Results</h1>

    @if(isset($matchedItems) && is_array($matchedItems) && count($matchedItems) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Lost Item ID</th>
                    <th>Found Item ID</th>
                    <th>Lost Item Date</th>
                    <th>Found Item Date</th>
                    <th>Lost Item Color</th>
                    <th>Found Item Color</th>
                    <th>Lost Item Model</th>
                    <th>Found Item Model</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($matchedItems as $match)
                    <tr>
                        <td>{{ $match['lost_item']->id }}</td>
                        <td>{{ $match['found_item']->id }}</td>
                        <td>{{ $match['lost_item']->lostItemDescription->date_lost ?? 'N/A' }}</td>
                        <td>{{ $match['found_item']->foundItemDescription->dateFound ?? 'N/A' }}</td>
                        <td>{{ $match['lost_item']->lostItemDescription->color ?? 'N/A' }}</td>
                        <td>{{ $match['found_item']->foundItemDescription->Color ?? 'N/A' }}</td>
                        <td>{{ $match['lost_item']->lostItemDescription->model ?? 'N/A' }}</td>
                        <td>{{ $match['found_item']->foundItemDescription->Model ?? 'N/A' }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No matched items found.</p>
    @endif
@endsection
