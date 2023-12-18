
@extends('layout')

@section('title', 'Gallery')

@section('content')
<h1>Gallery</h1>


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
        @foreach ($images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img src="{{ asset('storage/'.$image->image_url) }}" alt="Image" width="200px" height="200px">
                </td>
                @if(isset($imageDescriptions[$image->id]))
                    <td>{{ $imageDescriptions[$image->id]->category }}</td>
                    <td>{{ $imageDescriptions[$image->id]->date_lost }}</td>
                    <td>{{ $imageDescriptions[$image->id]->color }}</td>
                    <td>{{ $imageDescriptions[$image->id]->model }}</td>
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



@endsection