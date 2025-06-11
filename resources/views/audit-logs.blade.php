<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audit Logs | FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0d0d1f;
            font-family: 'Orbitron', sans-serif;
            color: #f1f1f1;
        }

        .container-box {
            max-width: 1000px;
            margin: 80px auto;
            background: #1a1a2e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px #0ff5;
        }

        h2 {
            color: #0ff;
            text-shadow: 0 0 10px #0ff;
        }

        .log-table {
            background-color: #21213a;
            color: #eee;
        }

        thead {
            background-color: #0ff2;
        }

        .log-table td, .log-table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <div class="container container-box">
        <h2 class="text-center mb-4">📜 Audit Logs</h2>
        <p class="text-center mb-4">Track system events and user actions for security and compliance.</p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped log-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>IP Address</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $index => $log)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $log->user_name }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->ip_address }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>