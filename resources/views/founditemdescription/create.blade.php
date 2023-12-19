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

<form method="POST" action="{{ route('founditemdescription.store') }}">
    @csrf
    <h2>Description</h2>

    <div class="form-group">
        <label for="dateFound">Date Found</label>
        <input type="date" name="dateFound" class="form-control" required>
    </div>

    <input type="hidden" name="category_id" value="{{ $defaultCategory->id }}">
    <input type="hidden" name="found_item_id" value="{{ $foundItems->first()->id }}"> 
    
        <label for="Color">Color</label>
        <input type="text" name="Color" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="Model">Model</label>
        <input type="text" name="Model" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    </form> 
</body>
</html>
@endsection