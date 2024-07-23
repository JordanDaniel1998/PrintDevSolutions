@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo-swipper-modified.css') }}">
@endpush

<!-- Vista principal del frontend -->

@section('contenido')
    @include('frontend.home.main.components.slider-main')
    @include('frontend.home.main.components.highlighteds')
@endsection


@push('scripts')
    @vite(['resources/js/carrito.js'])
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper_slider_main = new Swiper(".slider-main", {
                slidesPerView: 1,
                spaceBetween: 30,
                grabCursor: true,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>
@endpush
