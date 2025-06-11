<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h2>Add New Customer</h2>

    <form method="POST" action="/customer">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" required><br><br>

        <button type="submit">Save Customer</button>
    </form>

    <br>
    <a href="/customers">← Back to Customers</a>
</body>
</html>