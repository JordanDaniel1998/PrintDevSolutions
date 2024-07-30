@extends('frontend.layouts.app')

@section('contenido')
    <section class="w-11/12 mx-auto mt-8 mb-16 flex flex-col gap-5">
        <div class="text-text14 md:text-text16 flex justify-start items-center gap-2">
            <a href="{{ route('carrito.index') }}" class="font-inter font-medium text-[#565656]">
                Carrito
            </a>
        </div>
        <div class="flex md:gap-20">
            <div
                class="flex flex-col md:flex-row md:justify-between md:items-center md:basis-7/12 w-full md:w-auto text-text18">
                <p
                    class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                    <span class="flex items-center h-full justify-start">Carro de la compra</span>
                </p>

                <p
                    class="font-inter font-bold text-[#C8C8C8] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center flex justify-start md:justify-center items-center">
                    <span class="flex items-center h-full">Detalles de pago</span>
                </p>

                <p
                    class="font-inter font-bold text-[#C8C8C8] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                    <span class="flex items-center h-full justify-start md:justify-end">Orden completada</span>
                </p>
            </div>
            <div class="md:basis-5/12"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-10 md:gap-20">
            <div class="basis-7/12 flex flex-col">
                @foreach ($carts as $cart)
                    <div data-aos="fade-up" data-aos-offset="150">
                        <div class="flex flex-col lg:flex-row pb-5 border-b-[2px] border-[#E8ECEF] gap-5">
                            <div class="w-full basis-5/12">
                                <p class="font-inter font-bold text-text14 xl:text-text16 text-[#141718] text-left py-4">
                                    Producto
                                </p>

                                <div class="flex justify-start items-center w-full gap-5">
                                    <a href="{{ route('productstoUser.index', $cart['id']) }}"
                                        class="w-[120px] inline-block">
                                        <img src="{{ asset('storage/uploads/' . $cart['image']) }}" alt="producto"
                                            class="w-[120px] object-cover" />
                                    </a>
                                    <div class="flex flex-col justify-start items-start w-full gap-1 md:gap-2">
                                        <h3 class="font-inter font-bold text-text14 xl:text-text16 text-[#151515]">
                                            {{ $cart['title'] }}
                                        </h3>
                                        @if ($cart['color'])
                                            <p
                                                class="font-inter font-normal text-[12px] md:text-text16 text-[#6C7275] flex justify-start items-center gap-2">
                                                Color: <span class="w-5 h-5 inline-block rounded-full border-2"
                                                    style="background-color: {{ $cart['color'] ? $cart['color'] : '' }};"></span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 md:gap-5 w-full text-center basis-7/12 justify-start items-center">
                                <div class="flex-1">
                                    <p
                                        class="font-inter font-bold text-text14 xl:text-text16 text-[#141718] pt-4 pb-6 lg:pb-14">
                                        Cantidad
                                    </p>

                                    <div>
                                        <div
                                            class="inline-flex justify-start items-center divide-x-2 divide-gray-200 text-black font-inter font-bold text-text16 xl:text-text20">
                                            <span class="px-3 py-1">{{ $cart['quantity'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <p
                                        class="font-inter font-bold text-text14 xl:text-text16 text-[#141718] pt-4 pb-6 lg:pb-14">
                                        Precio
                                    </p>
                                    <p
                                        class="font-inter font-bold text-text16 xl:text-text20 text-[#151515] flex gap-2 justify-center items-center">
                                        S/
                                        <span>{{ number_format($cart['price'] - ($cart['discount'] / 100) * $cart['price'], 2) }}</span>
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <p
                                        class="font-inter font-bold text-text14 xl:text-text16 text-[#141718] pt-4 pb-6 lg:pb-14">
                                        Sub Total
                                    </p>
                                    <p
                                        class="font-inter font-bold text-text16 xl:text-text20 text-[#151515] flex justify-center items-center">
                                        S/
                                        {{ number_format($cart['quantity'] * ($cart['price'] - ($cart['discount'] / 100) * $cart['price']), 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="basis-5/12 flex flex-col justify-start gap-5" data-aos="fade-up" data-aos-offset="150">
                <h2 class="font-inter font-bold text-text20 xl:text-text22 text-[#151515] pt-3">
                    Resumen de la compra
                </h2>

                @livewire('shoppingcart.resume')
            </div>
        </div>
    </section>

    <section class="bg-[#F3F3F3] w-11/12 mx-auto">

        <div
            class="flex flex-col md:flex-row justify-between items-center gap-5 pt-5 md:pt-10 pl-5 md:pl-10 pr-5 md:pr-10 mb-20">
            <div class="flex flex-col gap-6" data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col gap-3">
                    <p class="text-[#02173C] font-inter font-bold text-text32 leading-[38px]">¿Aún tienes alguna duda?</h2>
                    <p class="text-[#02173C] font-inter font-normal text-text18">Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere.</p>
                </div>

                <div class="flex justify-start items-center pb-8">
                    <a target="_blank"
                        href="https://api.whatsapp.com/send?phone={{ $informations->whatsapp }}&text={{ $informations->message_whatsapp }}"
                        rel="noopener"
                        class="text-[#FFFFFF] font-inter font-bold text-text16 py-3 bg-[#001232] px-5 w-full text-center md:inline-flex md:w-auto">Ponerse
                        en contacto</a>
                </div>
            </div>

            <div>
                <img src="{{ asset('images/img/image_9.png') }}" loading="lazy" alt="contacto">
            </div>
        </div>

    </section>
@endsection
