<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
</head>
<body>
    <h2>Registered Customers</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="/customer/create">Add New Customer</a>
    <ul>
        @foreach ($customers as $customer)
            <li>{{ $customer->name }} — {{ $customer->email }} — {{ $customer->phone }}</li>
        @endforeach
    </ul>
</body>
</html>