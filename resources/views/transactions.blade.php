<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions | FinNova</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Styles -->
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

        .txn-table {
            background-color: #21213a;
            color: #eee;
        }

        thead {
            background-color: #0ff2;
        }

        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="container container-box">
        <h2 class="text-center mb-4">📄 Transactions</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped txn-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Amount (GHS)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $index => $txn)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $txn->reference }}</td>
                            <td>{{ $txn->customer->name ?? 'Unknown' }}</td>
                            <td>
                                <span class="badge 
                                    {{ $txn->type === 'deposit' ? 'bg-success' : ($txn->type === 'withdrawal' ? 'bg-danger' : 'bg-info') }}">
                                    {{ ucfirst($txn->type) }}
                                </span>
                            </td>
                            <td>{{ number_format($txn->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($txn->created_at)->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No transactions recorded.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>