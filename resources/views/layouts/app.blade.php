
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FinNova</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-900 text-cyan-200 font-sans antialiased min-h-screen">
    <nav class="bg-cyan-800 text-white p-4 flex justify-between items-center shadow">
        <h1 class="text-xl font-bold">FinNova</h1>
        <div>
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-cyan-600 hover:bg-cyan-500 text-white px-4 py-2 rounded">Logout</button>
            </form>
            @endauth
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>