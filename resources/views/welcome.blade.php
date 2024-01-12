<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
     body {
      background-image: url('images/lost-and-found.jpg'); /* Replace 'background.jpg' with the actual filename of your image */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed; /* Optional: This will make the background fixed while scrolling */
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }


    .form-label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    a {
      color: #007bff;
    }

    a:hover {
      color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="container">
    @include('components.alert')
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-3">  
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
      <p class="mt-3">Don't have an account? <a href="{{ route('registration') }}">Register here</a></p>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
