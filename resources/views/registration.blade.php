<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  @include('components.alert')

  <div class="container">
    <form action="{{route('registration-post')}}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">

      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <p class="mt-3">Already have an account? <a href="{{ url('/') }}">Login here</a></p>

  </div>

</body>
</html>