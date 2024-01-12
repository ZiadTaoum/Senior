<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
     body {
      background-image: url('images/Document.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed; 
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

    #emailHelp {
      color: #6c757d;
    }
  </style>
</head>
<body>

  @include('components.alert')

  <div class="container">
    <form action="{{ route('registration-post') }}" method="POST">
      @csrf
      <ul class="navbar-logo">
        <span>
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="200px" height="200px" style="border-radius: 10px;">
        </span>
    </ul>
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" required>
        <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <p class="mt-3">Already have an account? <a href="{{ url('/') }}">Login here</a></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
