@extends('frontend.layouts.app')


<!-- Vista principal del frontend -->

@section('contenido')
    @include('frontend.home.main.components.slider-main')
    @include('frontend.home.main.components.highlighteds')
    @include('frontend.home.main.components.partners')
    @include('frontend.home.main.components.testimonies')
    @include('frontend.home.main.components.blogs')
@endsection


@push('scripts')
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

            const swiper_slider_partners = new Swiper(".swiper_slider_partners", {
                slidesPerView: 5,
                spaceBetween: 30,
                grabCursor: true,
                loop: true,
                centeredSlides: false,
                autoplay: {
                    delay: 1000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        centeredSlides: true,
                    },
                    768: {
                        slidesPerView: 5,
                        centeredSlides: false,
                    }
                }
            });


            const swiper_slider_testimonies = new Swiper(".swiper_slider_testimonies", {
                slidesPerView: 3,
                spaceBetween: 30,
                grabCursor: true,
                loop: true,
                centeredSlides: false,
                allowTouchMove: false,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        centeredSlides: true,
                    },
                    768: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: 3,
                        centeredSlides: false,
                    }
                }
            });
        });
    </script>
@endpush
