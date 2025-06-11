<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Settings | FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0c0c1a;
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
        }

        .settings-container {
            max-width: 900px;
            margin: 80px auto;
            background: #1a1a2e;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 15px #0ff5;
        }

        h1, h4 {
            color: #0ff;
        }

        .section-box {
            background-color: #23233c;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px #0ff3;
        }

        .neon-btn {
            background: transparent;
            color: #0ff;
            border: 2px solid #0ff;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 15px;
            transition: 0.3s;
        }

        .neon-btn:hover {
            background-color: #0ff;
            color: #000;
            box-shadow: 0 0 15px #0ff, 0 0 30px #0ff;
        }
    </style>
</head>
<body>

<div class="container settings-container">
    <h1 class="text-center mb-4">⚙ System Settings</h1>
    <p class="text-center mb-5">Manage core configuration, users, security policies, and system tools for FinNova.</p>

    

    <!-- General Settings -->
    <div class="section-box">
        <h4>🛠 General Configuration</h4>
        <p>Set system name, logo, default region, and language preferences.</p>
        <button class="neon-btn">Edit Settings</button>
    </div>

    <!-- User Management -->
    <div class="section-box">
        <h4>👥 User Roles & Access</h4>
        <p>Manage roles (admin, staff, customer) and permissions across modules.</p>
        <button class="neon-btn">Manage Roles</button>
    </div>

    <!-- Security Settings -->
    <div class="section-box">
        <h4>🔐 Security Policies</h4>
        <p>Enforce password rules, two-factor auth (2FA), and session timeout policies.</p>
        <button class="neon-btn">Update Policies</button>
    </div>

    <!-- Backup & Logs -->
    <div class="section-box">
        <h4>🧱 Data Backup & Audit Logs</h4>
        <p>Run database backups and download audit trails for system compliance.</p>
        <button class="neon-btn">Backup Now</button>
        <a href="{{ route('logs') }}" class="neon-btn ms-2">View Logs</a>
    </div>
</div>

</body>
</html>