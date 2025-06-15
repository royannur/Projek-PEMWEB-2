<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Login</title>
  <style>
    body {
      background-color: #dcdcdc;
    }

    .login-box {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: white;
      background-color: #dcdcdc;
      border: 4px solid #007bff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 18%;
    }

    .login-box h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .form-control {
      border: 2px solid green;
      border-radius: 5px;
    }

    .btn-custom {
      background-color: green;
      color: white;
      font-weight: bold;
      width: 100%;
    }

    .btn-custom:hover {
      background-color: darkgreen;
    }
    .top-logo {
      position: absolute;
      top: 20px;
      right: 20px;
      width: 80px;
    }

  </style>
</head>
<body>
  
  <div class="login-box">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="top-logo">

    <h2>User Login Form</h2>

    @if(Session::has('error'))
      <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
      </div>
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif

    <form action="{{ URL('/user-login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Enter Email">
        @error('email')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <a href="{{ url('/form') }}">Belum punya akun? Daftar</a>
      <button type="submit" class="btn btn-custom">Login</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
