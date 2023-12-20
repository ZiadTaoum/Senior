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
        <button id="switchFormButton">Switch Form</button>

        <div class="formContainer" id="form1Container">
            <div class="container">
                <h2>Report Found Item </h2>
                <form method="POST" action="{{ route('founditem.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Item Image</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <select name="address_id" class="form-control" required id="found_item_addresses">
                            <option value="" selected disabled>Select Address</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" class="form-control" required id="found_item_categories">
                            <option value="" selected disabled>Select Category</option>
                        </select>
                    </div>

                    {{-- <input type="text" onkeyup="searchCategory(this.value)"> --}}

                    <input type="hidden" name="submit_type" value="first_form">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

        <div class="formContainer" id="form2Container" style="display: none;">
            <div class="container">
                <h2>Report Lost Item</h2>
                <form method="POST" action="{{ route('lostitem.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Item Image</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <select name="address_id" class="form-control" required id="lost_item_addresses">
                            <option value="" selected disabled>Select Address</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" class="form-control" required id="lost_item_categories">
                            <option value="" selected disabled>Select Category</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="reward">Reward</label>
                        <input type="text" name="reward_description" class="form-control" required>
                    </div>

                    <input type="hidden" name="submit_type" value="second_form">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
                </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var switchFormButton = document.getElementById('switchFormButton');
                var form1Container = document.getElementById('form1Container');
                var form2Container = document.getElementById('form2Container');

                switchFormButton.addEventListener('click', function() {
                    form1Container.style.display = form1Container.style.display === 'none' ? 'block' : 'none';
                    form2Container.style.display = form2Container.style.display === 'none' ? 'block' : 'none';
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('get-categories') }}",
                    success: function(response) {
                        console.log('got categories');
                        console.log(response);

                        if (response.status == 200) {
                            for (var i = 0; i < response.categories.length; i++) {
                                var category = "<option value=" + response.categories[i].id + ">" + response
                                    .categories[i].category_name + "</option>";
                                $("#lost_item_categories").append(category);
                                
                                $("#found_item_categories").append(category);
                            }
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ route('get-addresses') }}",
                    success: function(response) {
                        console.log('got addresses');
                        console.log(response);

                        if (response.status == 200) {
                            for (var i = 0; i < response.addresses.length; i++) {
                                var address_string = response.addresses[i].governorate + " | " + response
                                    .addresses[i].city + " | " + response.addresses[i].street;
                                var address = "<option value=" + response.addresses[i].id + ">" +
                                    address_string + "</option>";
                                $("#lost_item_addresses").append(address);
                                $("#found_item_addresses").append(address);
                            }
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });

            });

        </script>

    </body>

    </html>
@endsection
