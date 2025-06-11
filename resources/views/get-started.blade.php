<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Started | FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0c0c1a;
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
            text-align: center;
        }

        .container-box {
            max-width: 700px;
            margin: 80px auto;
            background: #1f1f2f;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px #0ff5;
        }

        h1 {
            color: #0ff;
            text-shadow: 0 0 10px #0ff;
        }

        .feature-list {
            text-align: left;
            margin-top: 30px;
        }

        .feature-list li {
            margin: 12px 0;
            font-size: 1rem;
        }

        .neon-btn {
            background: transparent;
            border: 2px solid #0ff;
            color: #0ff;
            padding: 12px 30px;
            text-transform: uppercase;
            font-weight: bold;
            margin: 10px;
            transition: 0.3s ease;
        }

        .neon-btn:hover {
            background-color: #0ff;
            color: #000;
            box-shadow: 0 0 12px #0ff, 0 0 24px #0ff;
        }

        .footer {
            margin-top: 60px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container-box">
        <h1>Get Started with FinNova</h1>
        <p class="lead mt-3">
            Experience secure, inclusive digital banking for non-financial institutions.
        </p>

        <ul class="feature-list">
            <li>✅ Register and manage customers</li>
            <li>✅ Apply for and process smart loans</li>
            <li>✅ Simulate mobile money transactions</li>
            <li>✅ Track actions with blockchain-style audit logs</li>
            <li>✅ Access the platform via role-based dashboards</li>
        </ul>

        <div class="mt-4">
            <a href="{{ route('register') }}" class="neon-btn">Register</a>
            <a href="{{ route('login') }}" class="neon-btn">Login</a>
            <a href="{{ url('/') }}" class="neon-btn">Back to Welcome</a>
        </div>
    </div>

    <div class="footer">
        &copy; {{ now()->year }} FinNova — Built for Ghana’s Digital Finance Revolution.
    </div>

</body>
</html>