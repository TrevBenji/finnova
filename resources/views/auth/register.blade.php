        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | FinNova</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
        }
        .register-card {
            background-color: #1f1f1f;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 15px #0ff5;
            max-width: 400px;
            margin: 80px auto;
        }
        .neon-btn {
            background: transparent;
            color: #0ff;
            border: 2px solid #0ff;
            width: 100%;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .neon-btn:hover {
            background: #0ff;
            color: #000;
            box-shadow: 0 0 10px #0ff, 0 0 20px #0ff;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h2 class="text-center mb-4" style="color: #0ff;">Register for FinNova</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="neon-btn">Register</button>
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-light">Already have an account? Login</a>
            </div>
        </form>
    </div>
</body>
</html>