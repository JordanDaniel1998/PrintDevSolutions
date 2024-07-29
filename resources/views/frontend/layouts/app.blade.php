<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PrintDevSolutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/carrito.js'])

    <!-- Animación ASOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css">

    <!-- Swiper js -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo-swipper-modified.css') }}">

    <!-- Al instalar livewire, por defecto viene Alpine.js -->
    @livewireStyles
    @stack('styles')
</head>

<body class="font-inter">
    @include('frontend.layouts.header')

    <main>
        @yield('contenido')
    </main>


    @include('frontend.layouts.footer')


    @livewireScripts

    <!-- Swiper js -->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <!-- carrito -->
    @vite(['resources/js/carrito.js'])
    <!-- AOS  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>

    @stack('scripts')


</body>

</html>
