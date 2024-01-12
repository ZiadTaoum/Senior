@extends('layout')

@section('title', 'Report')

@section('content')

    <div class="report">
        <h1 style="color: orangered">Report a Found or Lost Item</h1>

        <p>If you have found an item or lost one, you can report it here. Reporting items helps connect owners with their
            lost belongings.</p>

        <div class="item-container">
            <div class="found-item">
                <h2 style="color: orangered">Found Item</h2>
                <p>If you have found an item, please provide details about it. Include information such as the item's name,
                    description, and where it was found. Additionally, you may upload an image to help identify the item.</p>
                <img src="{{ asset('images/lostandfound.webp') }}" alt="Found Item Image" style="max-width: 300px; height: auto; margin-bottom: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; border-radius: 8px; background-color: #f2f2f2;">
            </div>

            <div class="lost-item">
                <h2 style="color: orangered">Lost Item</h2>
                <p>If you have lost an item, let us know the details. Describe the item, where you last saw it, and any distinct
                    features. Providing accurate information increases the chances of finding your lost item.</p>
                <img src="{{ asset('images/lost_and_found_box-color.jpg') }}" alt="Lost Item Image" style="max-width: 300px; height: auto; margin-bottom: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; border-radius: 8px; background-color: #f2f2f2;">
            </div>
        </div>

        <div class="report-button">
            <button onclick="window.location.href='{{ url('/founditem/create') }}'"> Report </button>
        </div>


    </div>

    <style>
        .report {
            text-align: center;
            margin: 20px;
        }

        .item-container {
            display: flex;
            justify-content: space-between;
        }

        .found-item,
        .lost-item {
            width: 48%;
            text-align: left;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #f2f2f2;
        }

        .report-button {
            margin-top: 20px;
        }


    </style>

@endsection
