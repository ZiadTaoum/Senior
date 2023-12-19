@extends('layout')

@section('title', 'Gallery')

@section('content')
<div class="container">
    <h1>Gallery</h1>

    <div class="row">
        @forelse ($images as $image)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$image->image_url) }}" class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->id }}</h5>
                        @if($image->lostItemDescription)
                            <p>Category: {{ $image->lostItemDescription->category }}</p>
                            <p>Date Lost: {{ $image->lostItemDescription->date_lost }}</p>
                            <p>Color: {{ $image->lostItemDescription->color }}</p>
                            <p>Model: {{ $image->lostItemDescription->model }}</p>
                        @else
                            <p>Category: N/A</p>
                            <p>Date Lost: N/A</p>
                            <p>Color: N/A</p>
                            <p>Model: N/A</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>No images found.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $images->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection