@extends('layout')

@section('title', 'Create Report')

@section('content')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 450px; /* Adjusted width */
            margin: 20px auto;
            background-color: #ddd; /* Grey background */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
    </style>
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

        <div class="form-group">
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
