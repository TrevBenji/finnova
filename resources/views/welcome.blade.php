<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom right, #0a0a0f, #12122a);
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
        }

        .hero {
            text-align: center;
            padding: 100px 20px 60px;
        }

        .hero h1 {
            font-size: 3rem;
            color: #0ff;
            text-shadow: 0 0 15px #0ff;
        }

        .hero p {
            font-size: 1.2rem;
            color: #aaa;
            max-width: 700px;
            margin: 20px auto;
        }

        .features {
            background-color: #181830;
            padding: 60px 20px;
        }

        .feature-box {
            background: #1f1f2f;
            border: 1px solid #2a2a3f;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px #0ff4;
        }

        .feature-box h4 {
            color: #0ff;
        }

        .neon-btn {
            background: transparent;
            border: 2px solid #0ff;
            color: #0ff;
            padding: 12px 30px;
            text-transform: uppercase;
            font-weight: bold;
            margin: 10px;
            transition: all 0.3s ease;
        }

        .neon-btn:hover {
            background: #0ff;
            color: #000;
            box-shadow: 0 0 10px #0ff, 0 0 20px #0ff;
        }

        .cta {
            text-align: center;
            padding: 40px 20px;
        }

        .footer {
            padding: 30px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

    <!-- Hero -->
    <section class="hero">
        <h1>Welcome to FinNova</h1>
        <p>
            A next-generation digital banking platform designed to empower Non-Financial Institutions (NFIs) in Ghana with secure, inclusive, and intelligent financial services.
        </p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="neon-btn">Login</a>
            <a href="{{ route('register') }}" class="neon-btn">Register</a>
            <a href="{{ url('/get-started') }}" class="neon-btn">Get Started</a>
        </div>
    </section>

    <!-- Feature Overview -->
    <section class="features">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>📱 Mobile Integration</h4>
                        <p>Simulate and manage mobile money transactions to expand financial reach to underserved regions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>🔐 Blockchain Logs</h4>
                        <p>Every user action is hash-tracked to ensure auditability and data integrity across the system.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>🤖 Smart Loan Scoring</h4>
                        <p>Built-in logic assists in evaluating loan applications with minimal delay and bias.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <h2 class="text-info">Get onboard with FinNova today</h2>
        <p>Digitize your services, protect customer data, and empower local communities with financial tools.</p>
        <a href="{{ route('register') }}" class="neon-btn">Start Now</a>
    </section>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ now()->year }} FinNova | Designed for Ghana's Digital Finance Future
    </div>

</body>
</html>