@extends('layout')

@section('title', 'Report')

@section('content')


    <div class="report">
        <h1>Report a Found or Lost Item</h1>

        <p>If you have found an item or lost one, you can report it here. Reporting items helps connect owners with their
            lost belongings.</p>

        <h2>Found Item</h2>
        <p>If you have found an item, please provide details about it. Include information such as the item's name,
            description, and where it was found. Additionally, you may upload an image to help identify the item.</p>

        <h2>Lost Item</h2>
        <p>If you have lost an item, let us know the details. Describe the item, where you last saw it, and any distinct
            features. Providing accurate information increases the chances of finding your lost item.</p>

        <h2>How to Report</h2>
        <p>Click on the "Report" button and fill out the form with the required information. Make sure to provide contact
            details so we can reach out to you if needed.</p>

        <p>Thank you for helping us reunite people with their belongings!</p>

        <button onclick="window.location.href='{{ url('/founditem/create') }}'"> Report </button>
    </div>


@endsection
