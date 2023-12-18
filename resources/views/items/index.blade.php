@extends('layout')

@section('title', 'ADMIN')

@section('content')


<style>
    .found {
         display: inline-block;
          float: right;   
        margin-right: 50px; /* Adjust the margin as needed */
    }

    .table-container {
         clear: both;  
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
                    <img src="{{ asset($lostItem->image->image_url) }}" alt="Image" width="200px" height="200px">
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
                    <img src="{{ asset($foundItem->image->image_url) }}" alt="Image" width="200px" height="200px">
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
    </div>
</div>
@endsection