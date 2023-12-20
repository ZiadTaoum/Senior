@extends('layout')

@section('title', 'Create Report')

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>

    <body>

        <form method="POST" action="{{ route('lostitemdescription.store') }}">
            @csrf
            <h2>Description</h2>

            <div class="form-group">
                <label for="dateFound">Date Lost</label>
                <input type="date" name="date_lost" class="form-control" required>
            </div>

            <input type="hidden" name="lost_item_id" value="{{ $lost_item_id }}"> 

            <label for="Color">Color</label>
            <input type="text" name="color" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" name="model" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </body>

    </html>
@endsection
