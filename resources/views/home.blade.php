<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FinNova | Future of Digital Finance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Neon/Tech Theme Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #111, #1a1a1a);
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
            color: #ccc;
        }
        .neon-btn {
            background-color: transparent;
            border: 2px solid #0ff;
            color: #0ff;
            padding: 12px 24px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }
        .neon-btn:hover {
            background-color: #0ff;
            color: #000;
            box-shadow: 0 0 10px #0ff, 0 0 20px #0ff;
        }
        .features {
            padding: 60px 0;
        }
        .feature-box {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #2a2a2a;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-box:hover {
            transform: scale(1.03);
            box-shadow: 0 0 20px #0ff33f55;
        }
        .cta-section {
            padding: 60px 20px;
            background: #0ff;
            text-align: center;
            color: #000;
        }
        .cta-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .logo {
            width: 180px;
            margin-bottom: 30px;
            filter: drop-shadow(0 0 10px #0ff);
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <img src="{{ asset('images/finnova-logo.jpg') }}" alt="FinNova Logo" class="logo">
            <h1>Welcome to FinNova</h1>
            <p>The Future of Digital Banking for Non-Financial Institutions in Ghana</p>
            <div class="mt-4">
                <a href="/login" class="neon-btn me-3">Login</a>
                <a href="/register" class="neon-btn">Register</a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>💡 AI-Powered Credit Scoring</h4>
                        <p>FinNova analyzes applicant data in real time using smart scoring models.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>🔐 Blockchain-Logged Transactions</h4>
                        <p>All actions are hashed and tracked for security and transparency.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>📲 Mobile Money Simulation</h4>
                        <p>Easy integration for low-bandwidth and remote access customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <h2>Digitize Financial Services. Empower Communities.</h2>
            <p class="mb-4">Join us in transforming the future of inclusive finance in Ghana.</p>
            <a href="/get-started" class="btn btn-dark btn-lg">Get Started</a>
        </div>
    </section>

</body>
</html>