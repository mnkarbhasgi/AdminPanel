<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/templatemo-space-dynamic.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <!-- Slick Slider CSS -->
        {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/slick-carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        @yield('title')

        


</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')
</body>
</html>