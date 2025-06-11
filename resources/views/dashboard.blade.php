<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #111;
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
        }

        .dashboard-header {
            text-align: center;
            padding: 60px 20px 30px;
        }

        .dashboard-header h1 {
            color: #0ff;
            text-shadow: 0 0 15px #0ff;
        }

        .neon-card {
            background-color: #1f1f1f;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 10px #0ff5;
            transition: 0.3s ease;
        }

        .neon-card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px #0ff8;
        }

        .neon-btn {
            background: transparent;
            color: #0ff;
            border: 2px solid #0ff;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .neon-btn:hover {
            background: #0ff;
            color: #000;
            box-shadow: 0 0 10px #0ff, 0 0 20px #0ff;
        }

        .footer {
            text-align: center;
            padding: 40px 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="dashboard-header">
        <h1>Hello, {{ Auth::user()->name }}</h1>
        <p>Welcome to your FinNova dashboard — powering smart, secure financial services.</p>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="neon-btn mt-3">Logout</button>
</form>
    </div>

    <div class="container mb-5">
        <div class="row g-4">

            <!-- Quick Stats -->
            <div class="col-md-4">
                <div class="neon-card text-center">
                    <h4>👥 Customers</h4>
                    <p class="fs-4">1,245</p>
                    <a href="/customers" class="neon-btn">Manage</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="neon-card text-center">
                    <h4>💰 Loans</h4>
                    <p class="fs-4">508</p>
                    <a href="/loans" class="neon-btn">View Loans</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="neon-card text-center">
                    <h4>📄 Transactions</h4>
                    <p class="fs-4">3,716</p>
                    <a href="/transactions" class="neon-btn">See All</a>
                </div>
            </div>
        </div>

        <!-- System Tools -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="neon-card text-center">
                    <h4>⚙ System Tools</h4>
                    <p>Access audit logs, data backup, user permissions, and performance monitoring.</p>
                    <a href="{{ route('logs') }}" class="neon-btn me-2">Audit Logs</a>
                    <a href="{{ route('settings') }}" class="neon-btn">System Settings</a>
                    <a href="{{ route('customers') }}" class="neon-btn">Manage</a>
                    <a href="{{ route('loans') }}" class="neon-btn">View Loans</a>
                    <a href="{{ route('transactions') }}" class="neon-btn">See All</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; {{ now()->year }} FinNova. Secure. Smart. Inclusive.
    </div>

</body>
</html>