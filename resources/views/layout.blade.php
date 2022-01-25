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
    <section class="flex justify-between absolute top-1">
        <a href="{{ route('index', app()->currentLocale()) }}" class="px-6 py-4">Homepage</a>
        @admin
            <a href="{{ route('logout', app()->currentLocale()) }}" class="px-6 py-4">Log Out</a>
            <a href="{{ route('admin.movies') }}" class="px-6 py-4">Admin Panel</a>
        @else
            @auth
                <a href="{{ route('logout', app()->currentLocale()) }}" class="px-6 py-4">Log Out</a>
            @else
                <a href="{{ route('login', app()->currentLocale()) }}" class="px-6 py-4">Log In</a>
            @endauth
        @endadmin
    </section>

    @yield('content')

    <x-success />
</body>

</html>
