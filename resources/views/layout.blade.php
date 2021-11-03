<!DOCTYPE html>
<html class="h-full">

<head>
    <title>Movie Quotes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <style>
        body {
            background: radial-gradient(circle at 50% 50%, #4E4E4E 0%, #3D3B3B 99.97%, #484848 99.98%, #3D3B3B 99.99%, #3D3B3B 100%);
        }

    </style>
</head>


<body class="h-full">
    @auth
        <div>
            <a href="/logout" class="fixed px-6 py-6 right-1.5">Log Out</a>
        </div>
    @endauth

    @yield('content')

    <x-success />
</body>

</html>
