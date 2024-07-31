@extends('frontend.layouts.app')

@section('contenido')
    <section class="mt-5 mb-10 w-11/12 mx-auto">
        <div class="flex flex-col lg:flex-row gap-32 md:gap-10">
            <div class="md:basis-1/2 flex flex-col gap-10 basis-0">
                <div class="text-text14 xl:text-text16 flex justify-start items-center gap-2" data-aos="fade-up"
                    data-aos-offset="150">
                    <button type="button" class="font-inter font-medium text-[#565656]" disabled>
                        Carrito
                    </button>
                    <img src="{{ asset('images/svg/svg_13.svg') }}" alt="upload photo" loading="lazy" />
                    <button type="button" class="font-inter font-medium text-[#565656]" disabled>Detalles de pago</button>
                    <img src="{{ asset('images/svg/svg_13.svg') }}" alt="upload photo" loading="lazy" />
                    <button type="button" class="font-inter font-bold text-[#141718]" disabled>Orden completada</button>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between md:items-center lg:basis-7/12 w-full lg:w-auto text-text18"
                    data-aos="fade-up" data-aos-offset="150">
                    <p
                        class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                        <span class="flex items-center h-full justify-start">Carro de la compra</span>
                    </p>

                    <p
                        class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                        <span class="flex items-center h-full justify-start md:justify-center">Detalles de pago</span>
                    </p>

                    <p
                        class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                        <span class="flex items-center h-full justify-start md:justify-center">Orden completada</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-start gap-5 md:gap-10 max-w-[900px] mx-auto pt-10 text-center">
            <div class="flex flex-col gap-4 justify-center items-center">
                <p data-aos="fade-up" data-aos-offset="150"
                    class="text-[#6C7275] font-inter font-medium text-text18 xl:text-text24 ">
                    Gracias por tu compra &#127881;
                </p>
                <h2 data-aos="fade-up" data-aos-offset="150"
                    class="font-inter font-bold text-text40 md:text-text44 text-[#151515] leading-[56px] max-w-[600px]">
                    Tu orden ha sido recibida
                </h2>
                <p data-aos="fade-up" data-aos-offset="150"
                    class="font-inter font-medium text-text16 md:text-text20 text-[#6C7275]">
                    Código de pedido
                </p>
                <p data-aos="fade-up" data-aos-offset="150"
                    class="font-inter font-bold text-text16 md:text-text20 text-[#141718]">
                    #0123_45678
                </p>
            </div>

            <div class="flex flex-col gap-5">

                @foreach ($carts as $cart)

                    <div data-aos="fade-up" data-aos-offset="150"
                        class="flex flex-col md:flex-row pb-8 border-b-[2px] border-[#E8ECEF] gap-5">
                        <div class="w-full basis-5/12">
                            <p class="font-inter font-bold text-text14 xl:text-text18 text-[#141718] text-left py-4">
                                Producto
                            </p>

                            <div class="flex justify-start md:justify-center items-center gap-5">
                                <div
                                    class="h-full w-full flex justify-center basis-1/3 md:basis-1/2 items-center bg-[#F3F3F3] p-5">
                                    <a href="{{ route('productstoUser.index', $cart->product_id) }}"
                                        class="w-[120px] inline-block">
                                        <img src="{{ asset('storage/uploads/' . $cart->product->imagen) }}" alt="producto"
                                            class="w-[120px] object-cover" />
                                    </a>
                                </div>

                                <div class="flex flex-col gap-2 basis-2/3 md:basis-1/2 md:flex-1 items-start">
                                    <h3 class="font-inter font-bold text-text16 xl:text-text18 text-[#151515] text-left">
                                        {{ $cart->product->title }}
                                    </h3>
                                    @if ($cart->color)
                                        <p
                                            class="font-inter font-normal text-[12px] md:text-text16 text-[#6C7275] flex justify-start items-center gap-2 text-left">
                                            Color: <span class="w-5 h-5 inline-block rounded-full border-2"
                                                style="background-color: {{ $cart['color'] ? $cart['color'] : '' }};"></span>
                                        </p>
                                    @endif
                                    <p class="font-inter font-normal text-text12 xl:text-text14 text-[#6C7275] text-left">
                                        SKU: {{ $cart->product->sku }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-10 w-full text-center basis-7/12">
                            <div class="flex-1">
                                <p class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                    Cantidad
                                </p>

                                <div class="flex justify-center text-[#151515] md:pt-8">
                                    <div class="w-8 h-8 flex justify-center items-center flex-1">
                                        <span
                                            class="font-inter font-bold text-text14 md:text-text18"> {{ $cart->quantity }} </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1">
                                <p class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                    Precio
                                </p>
                                <p class="font-inter font-bold text-text14 md:text-text18 text-[#151515] md:pt-8">
                                    S/ {{ ($cart->price_sale) }}
                                </p>
                            </div>

                            <div class="flex-1">
                                <p class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                    Sub Total
                                </p>
                                <p class="font-inter font-bold text-text14 md:text-text18 text-[#151515] md:pt-8">
                                    S/
                                    {{ $cart->price_sale * $cart->quantity }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="flex flex-col gap-5 pt-8 pb-5 md:pb-10">
                    <div data-aos="fade-up" data-aos-offset="150">
                      <a
                        href="{{ route('catalogs.index') }}"
                        class="text-white bg-[#0051FF] w-full py-3 cursor-pointer font-moderat_Bold text-text18 md:text-text20 inline-block text-center"
                        >Seguir comprando</a
                      >
                    </div>

                    <div data-aos="fade-up" data-aos-offset="150">
                      <a
                        href="{{ route('myAccount.orders', auth()->user()->id) }}"
                        class="text-white bg-[#001232] w-full py-3 cursor-pointer font-moderat_Bold text-text18 md:text-text20 inline-block text-center border-[1.5px] border-[#151515]"
                        >Historial de compras</a
                      >
                    </div>
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
