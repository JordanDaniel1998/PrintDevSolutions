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
    @stack('scripts')


</body>

</html>
