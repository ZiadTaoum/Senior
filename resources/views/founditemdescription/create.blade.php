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
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
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

    <form method="POST" action="{{ route('founditemdescription.store') }}">
        @csrf
        <h2>Description</h2>

        <div class="form-group">
            <label for="dateFound">Date Found</label>
            <input type="date" name="dateFound" class="form-control" required>
        </div>

        <input type="hidden" name="found_item_id" value="{{ $found_item_id }}">

        <div class="form-group">
            <label for="Color">Color</label>
            <input type="text" name="Color" class="form-control" required><small>Be careful with the color name</small>
        </div>

        <div class="form-group">
            <label for="Model">Model</label>
            <input type="text" name="Model" class="form-control" placeholder="Example: 2015" required>
        </div>

        <button type="submit">Submit</button>

    </form>
</body>

</html>
@endsection
