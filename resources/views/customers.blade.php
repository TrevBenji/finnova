<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers | FinNova</title>
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

        .neon-btn {
            background: transparent;
            color: #0ff;
            border: 2px solid #0ff;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .neon-btn:hover {
            background-color: #0ff;
            color: #000;
            box-shadow: 0 0 12px #0ff, 0 0 24px #0ff;
        }

        table {
            background-color: #21213a;
            color: #eee;
        }

        table thead {
            background-color: #0ff2;
        }

        table td, table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <div class="container container-box">
        <h2 class="text-center mb-4">👥 Customers</h2>

        <div class="text-end mb-3">
            <a href="{{ url('/customer/create') }}" class="neon-btn">+ Add New Customer</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>