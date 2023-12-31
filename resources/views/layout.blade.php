<!DOCTYPE html>
<html class="h-full">

<head>
    <title>Movie Quotes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
