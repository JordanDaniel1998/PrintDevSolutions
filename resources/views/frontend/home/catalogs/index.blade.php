@extends('frontend.layouts.app')

@section('contenido')
    <section class="w-11/12 mx-auto pb-16">
        <div class="bg-[#0051FF]">
            <div class="grid grid-cols-1 lg:grid-cols-2 pt-10 md:pt-0" data-aos="fade-up" data-aos-offset="150">
                <div
                    class="flex flex-col justify-center gap-5 order-1 lg:order-2 px-5 md:z-50 lg:-mx-[70px] w-full lg:w-11/12">
                    <p class="text-white text-text18 md:text-text20 font-inter font-bold blobk lg:hidden">Accesorios</p>
                    <h1 class="text-text40 md:text-text48 font-inter font-bold text-white leading-[56px] md:leading-tight">
                        Catálogo</h1>
                    <p class="text-white text-text14 md:text-text16 font-inter font-normal w-full lg:w-5/6 hidden lg:block">
                        Productos digitales</p>


                </div>

                <div class="flex justify-end md:justify-end  items-center py-10 order-2 lg:order-1 relative lg:z-10 pr-5">
                    <div class="bg-black rounded-full size-[300px] flex items-end justify-start">
                        <img src="{{ asset('images/img/image_3.png') }}" alt="impresora" class="size-[255px]"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-11/12 md:w-10/12 mx-auto">
        @livewire('catalogs.filter-products')
    </section>
@endsection
