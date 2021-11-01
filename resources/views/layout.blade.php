<!DOCTYPE html>
<html>

<head>
    <title>Movie Quotes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html {
            margin: 0px;
            height: 100%;
            width: 100%;
        }

        body {
            margin: 0px;
            min-height: 100%;
            width: 100%;
            /* background: radial-gradient(50% 50% at 50% 50%, #4E4E4E 0%, #3D3B3B 99.99%, #3D3B3B 100%); */
            background: radial-gradient(50% 50% at 50% 50%, #4E4E4E 0%, #3D3B3B 99.97%, #484848 99.98%, #3D3B3B 99.99%, #3D3B3B 100%);

        }

    </style>
</head>


<body>
    @yield('content')
</body>

</html>
