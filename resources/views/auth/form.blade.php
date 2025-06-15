<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Register</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #dcdcdc;
      font-family: Arial, sans-serif;
    }

    .register-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
    }

    .register-box {
      background-color: #dcdcdc;
      border: 4px solid #007bff;
      border-radius: 12px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
    }

    .register-box input[type="text"],
    .register-box input[type="email"],
    .register-box input[type="password"] {
      border: 2px solid green;
      border-radius: 10px;
      padding: 10px;
    }

    .register-box .btn-register {
      background-color: #006400;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      width: 100%;
    }

    .register-box .btn-register:hover {
      background-color: #008000;
    }

    .login-link {
      font-size: 13px;
      color: #004d00;
      margin-top: 10px;
      text-align: center;
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

<div class="register-container">
  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="top-logo">

  <div class="register-box">

    <h2 class="text-center mb-4 fw-bold">User Register Form</h2>

    @if(Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <form action="{{ url('/user-register') }}" method="POST">
      @csrf

      <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Enter Username">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

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

      <a href="{{ url('/login')}}">Sudah punya akun?Masuk</a>
      <button type="submit" class="btn btn-register mt-2">Register</button>
    </form>

    
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
