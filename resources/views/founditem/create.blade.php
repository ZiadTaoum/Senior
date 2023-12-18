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
                    <select name="address_id" class="form-control" required>
                        @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->city }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                 <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" required>
                </div>

                <h2>Description</h2>
            
                <div class="form-group">
                    <label for="dateFound">Date Found</label>
                    <input type="date" name="dateFound" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Color">Color</label>
                    <input type="text" name="Color" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Model">Model</label>
                    <input type="text" name="Model" class="form-control" required>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
    
             {{-- <form method="POST" action="{{ route('founditemdescription.store') }}">
                @csrf
                <h2>Description</h2>
            
                <div class="form-group">
                    <label for="dateFound">Date Found</label>
                    <input type="date" name="dateFound" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Color">Color</label>
                    <input type="text" name="Color" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Model">Model</label>
                    <input type="text" name="Model" class="form-control" required>
                </div>
    
               
                </form>  --}}
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
                    <select name="address_id" class="form-control" required>
                        @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->city }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                {{-- <div class="form-group">
                    <label for="user">User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
    
    
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="reward">Reward</label>
                    <input type="number" name="reward" class="form-control" required>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>   
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var switchFormButton = document.getElementById('switchFormButton');
            var form1Container = document.getElementById('form1Container');
            var form2Container = document.getElementById('form2Container');
    
            switchFormButton.addEventListener('click', function () {
                form1Container.style.display = form1Container.style.display === 'none' ? 'block' : 'none';
                form2Container.style.display = form2Container.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
    
    </body>
</html>
@endsection

