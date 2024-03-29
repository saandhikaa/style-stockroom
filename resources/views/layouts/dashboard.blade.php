<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.dashboard.header')
    
    <main class="p-4">
        @yield('main')
    </main>
    
    @include('partials.dashboard.sidebar')
</body>
</html>
