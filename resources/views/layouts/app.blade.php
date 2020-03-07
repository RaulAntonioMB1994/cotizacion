<!DOCTYPE html>
<html lang="es">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Cotizaciones')</title>
    @include('layouts.css')

</head>

<body>
    <div class="container">
        <div class="row-fluid">
            @yield('content')

        </div>
    </div>
    @include('layouts.footer')

    @include('layouts.js')

</body>

</html>