<!DOCTYPE html>
<html>

<head>
    <title>Mellow - Hotel HTML Website Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="preloader">
        <div class="loader"></div>
    </div>
    
    @include('common.header')

    @yield('content')
    @stack('scripts')
</body>

</html>
