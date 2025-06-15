<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EcoVenture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2e2e2e;
            color: white;
            font-family: Arial, sans-serif;
        }
        .dashboard-container {
            background-color: #dcdcdc;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .menu-btn {
            background-color: #0b4f1c;
            color: white;
            width: 200px;
            padding: 15px 0;
            margin: 10px 0;
            font-size: 24px;
            border: none;
            border-radius: 10px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
            transition: 0.3s;
        }
        .menu-btn:hover {
            background-color: #0a3f17;
        }
        .top-left-icon {
            position: absolute;
            top: 15px;
            left: 20px;
        }
        .top-right-logo {
            position: absolute;
            top: 10px;
            right: 20px;
        }
        .top-right-logo img {
            width: 80px;
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
    
    <div class="dashboard-container">
        <div class="top-right-logo">
            <img src="{{ asset('images/logo.png') }}" alt="EcoVenture Logo">
        </div>

        <!-- Tombol menu -->
        <button class="menu-btn" onclick="alert('Play button clicked')">Play</button>
        <button class="menu-btn" onclick="alert('Quiz button clicked')">Quiz</button>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="menu-btn" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
