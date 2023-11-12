<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    
    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.navbar')
    
    <main class="p-5">
        @yield('main')
    </main>
</body>
</html>