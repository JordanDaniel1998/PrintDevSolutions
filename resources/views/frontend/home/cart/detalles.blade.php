@extends('frontend.layouts.app')

@section('contenido')
    <section class="w-11/12 mx-auto mt-5 mb-10 flex flex-col gap-10">
        <div class="text-text14 md:text-text16 flex justify-start items-center gap-2" data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('carrito.index') }}" class="font-inter font-medium text-[#565656]">
                Carrito
            </a>
            <img src="{{ asset('images/svg/svg_13.svg') }}" alt="upload photo" loading="lazy" />
            <a href="{{ route('carrito.create') }}" class="font-inter font-bold text-[#141718]">Detalles de pago</a>
        </div>
        <div class="flex lg:gap-44" data-aos="fade-up" data-aos-offset="150">
            <div
                class="flex flex-col md:flex-row md:justify-between md:items-center lg:basis-7/12 w-full lg:w-auto text-text18 ">
                <p
                    class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                    <span class="flex items-center h-full justify-start">Carro de la compra</span>
                </p>

                <p
                    class="font-inter font-bold text-[#21201E] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                    <span class="flex items-center h-full justify-start md:justify-center">Detalles de pago</span>
                </p>

                <p
                    class="font-inter font-bold text-[#C8C8C8] border-b-[1px] border-[#6C7275] py-4 basis-1/3 h-full text-center">
                    <span class="flex items-center h-full justify-start md:justify-end">Orden completada</span>
                </p>
            </div>
            <div class="lg:basis-5/12"></div>
        </div>

        <div class="flex flex-col lg:flex-row lg:gap-44">
            <div class="basis-7/12 flex flex-col gap-10 ">
                <div class="flex flex-col gap-5">
                    <div>
                        <div class="flex flex-col gap-8">
                            <form action="{{ route('carrito.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-col gap-5 pb-10 border-b-2 border-[#565656]" data-aos="fade-up"
                                    data-aos-offset="150">
                                    <h2 class="font-inter font-bold text-text20 xl:text-text22 text-[#151515]">
                                        Información del contacto
                                    </h2>

                                    <div class="flex flex-col gap-5">
                                        <div class="flex flex-col md:flex-row gap-5">
                                            <div class="basis-1/2 flex flex-col gap-2" data-aos="fade-up"
                                                data-aos-offset="150">
                                                <label for="nombre"
                                                    class="font-inter font-medium text-text12 md:text-text14 text-[#565656]">Nombre</label>
                                                <input id="nombre" name="name" type="text" placeholder="Nombre"
                                                    class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 xl:text-text18 border-[1.5px] border-gray-200 text-[#565656] outline-none"
                                                    value="{{ auth()->user()->name }}" disabled/>
                                                @error('name')
                                                    <span class="text-red-500 font-medium">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="basis-1/2 flex flex-col gap-2" data-aos="fade-up"
                                                data-aos-offset="150">
                                                <label for="apellido"
                                                    class="font-inter font-medium text-text12 md:text-text14 text-[#565656]">Apellido</label>
                                                <input id="apellido" name="last" type="text" placeholder="Apellido"
                                                    class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 xl:text-text18 border-[1.5px] border-gray-200 text-[#565656]"
                                                    value="{{ auth()->user()->last }}" disabled/>
                                                @error('last')
                                                    <span class="text-red-500 font-medium">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-offset="150">
                                            <label for="email"
                                                class="font-inter font-medium text-text12 md:text-text14  text-[#565656]">E-mail</label>
                                            <input id="email" name="email" type="email"
                                                placeholder="Correo electrónico"
                                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 xl:text-text18 border-[1.5px] border-gray-200 text-[#565656]"
                                                value="{{ auth()->user()->email }}" disabled/>
                                            @error('email')
                                                <span class="text-red-500 font-medium">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-offset="150">
                                            <label for="celular"
                                                class="font-inter font-medium text-text12 md:text-text14  text-[#565656]">Celular</label>
                                            <input id="celular" type="tel" name="cellphone"
                                                placeholder="(+51) 000 000 000"
                                                class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 xl:text-text18 border-[1.5px] border-gray-200 text-[#565656]"
                                                value="{{ old('cellphone') }}" />
                                            @error('cellphone')
                                                <span class="text-red-500 font-medium">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-5 pb-10" data-aos="fade-up" data-aos-offset="150">
                                    <h2 class="font-inter font-bold text-text20 xl:text-text22 text-[#151515]">
                                        Método de pago
                                    </h2>
                                    <div class="w-full flex flex-col gap-5 border-dashed pb-10 border-b-2 border-[#E8ECEF]">
                                        <div class="flex items-center ps-4 border border-gray-200" data-aos="fade-up"
                                            data-aos-offset="150">
                                            <input type="radio" id="bordered-radio-tarjeta" name="payment_methods"
                                                value="tarjeta"
                                                class="focus:ring-transparent w-5 h-5 cursor-pointer cuentas"
                                                {{ old('payment_methods') == 'tarjeta' ? 'checked' : '' }} />
                                            <label for="bordered-radio-tarjeta"
                                                class="w-full py-4 ms-2 text-text16 md:text-text18 font-inter font-normal text-[#6C7275] flex justify-between items-center px-4">
                                                <span>Tarjeta de crédito</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center ps-4 border border-gray-200" data-aos="fade-up"
                                            data-aos-offset="150">
                                            <input type="radio" id="bordered-radio-debito" name="payment_methods"
                                                value="debito"
                                                class="focus:ring-transparent w-5 h-5 cursor-pointer cuentas"
                                                {{ old('payment_methods') == 'debito' ? 'checked' : '' }} />
                                            <label for="bordered-radio-debito"
                                                class="w-full py-4 ms-2 text-text16 md:text-text18 font-inter font-normal text-[#6C7275] flex justify-between items-center px-4">
                                                <span>Tarjeta de Débito</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center ps-4 border border-gray-200" data-aos="fade-up"
                                            data-aos-offset="150">
                                            <input type="radio" id="bordered-radio-cuenta" name="payment_methods"
                                                value="cuenta"
                                                class="focus:ring-transparent w-5 h-5 cursor-pointer cuentas inputVoucher"
                                                {{ old('payment_methods') == 'cuenta' ? 'checked' : '' }} />
                                            <label for="bordered-radio-cuenta"
                                                class="w-full py-4 ms-2 text-text16 md:text-text18 font-inter font-normal text-[#6C7275] flex justify-between items-center px-4">
                                                <span>Depósito a cuenta</span>
                                            </label>
                                        </div>

                                        @error('payment_methods')
                                            <span class="text-red-500 font-medium">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="pt-5">
                                        <div class="flex flex-col gap-5">
                                            <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-offset="150">
                                                <label for="nombre_tarjeta"
                                                    class="font-inter font-medium text-text12 md:text-text14 text-[#6C7275]">Nombre
                                                    de la tarjeta</label>
                                                <input id="nombre_tarjeta" type="text" name="name_cuenta"
                                                    placeholder="Nombre"
                                                    class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 md:text-text18 border-[1.5px] border-gray-200"
                                                    value="{{ old('name_cuenta') }}" />
                                                @error('name_cuenta')
                                                    <span class="text-red-500 font-medium">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-offset="150">
                                                <label for="numero_tarjeta"
                                                    class="font-inter font-medium text-text12 md:text-text14 text-[#6C7275]">Número
                                                    de tarjeta</label>
                                                <input id="numero_tarjeta" type="text" name="numero_cuenta"
                                                    placeholder="1234 12345 1234"
                                                    class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 md:text-text18 border-[1.5px] border-gray-200"
                                                    value="{{ old('numero_cuenta') }}" />
                                                @error('numero_cuenta')
                                                    <span class="text-red-500 font-medium">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col md:flex-row gap-5" data-aos="fade-up"
                                                data-aos-offset="150">
                                                <div class="basis-1/2 flex flex-col gap-2">
                                                    <label for="fecha_caducidad"
                                                        class="font-inter font-medium text-text12 md:text-text14 text-[#6C7275]">Fecha
                                                        de caducidad</label>
                                                    <input id="fecha_caducidad" type="date" name="fecha_cuenta"
                                                        placeholder="MM/AA"
                                                        class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 md:text-text18 border-[1.5px] border-gray-200"
                                                        value="{{ old('fecha_cuenta') }}" />
                                                    @error('fecha_cuenta')
                                                        <span class="text-red-500 font-medium">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="basis-1/2 flex flex-col gap-2">
                                                    <label for="CVC"
                                                        class="font-inter font-medium text-text12 md:text-text14 text-[#6C7275]">CVC</label>
                                                    <input id="CVC" type="text" name="cvc_cuenta"
                                                        placeholder="Código CVC"
                                                        class="w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-inter font-normal text-text16 md:text-text18 border-[1.5px] border-gray-200"
                                                        value="{{ old('cvc_cuenta') }}" />
                                                    @error('cvc_cuenta')
                                                        <span class="text-red-500 font-medium">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-10" data-aos="fade-up" data-aos-offset="150">
                                        <button type="submit"
                                            class="text-white bg-[#0051FF] w-full py-3 cursor-pointer border-2 font-inter font-bold text-text16 xl:text-text18 inline-block text-center border-none">
                                            Pagar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="basis-5/12 flex flex-col justify-start gap-10 pt-5 md:pt-0" data-aos="fade-up"
                data-aos-offset="150">
                <h2 class="font-inter font-bold text-text28 xl:text-text30 text-[#151515]">
                    Resumen del pedido
                </h2>

                <div>
                    <div class="flex flex-col gap-10">
                        @foreach ($carts as $cart)
                            <div class="flex justify-between border-b-[1px] border-[#E8ECEF] pb-5" data-aos="fade-up"
                                data-aos-offset="150">
                                <div class="flex justify-center items-center gap-5">
                                    <div class="h-full w-full flex justify-center flex-1 items-center bg-[#F3F3F3] p-5">
                                        <a href="{{ route('productstoUser.index', $cart['id']) }}"
                                            class="w-[100px] inline-block">
                                            <img src="{{ asset('storage/uploads/' . $cart['image']) }}" alt="producto"
                                                class="w-[100px] object-cover" />
                                        </a>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <h3 class="font-inter font-bold text-text16 xl:text-text18 text-[#151515]">
                                            {{ $cart['title'] }}
                                        </h3>
                                        @if ($cart['color'])
                                            <p
                                                class="font-inter font-normal text-[12px] md:text-text16 text-[#6C7275] flex justify-start items-center gap-2">
                                                Color: <span class="w-5 h-5 inline-block rounded-full border-2"
                                                    style="background-color: {{ $cart['color'] ? $cart['color'] : '' }};"></span>
                                            </p>
                                        @endif
                                        <div>
                                            <div
                                                class="inline-flex justify-start items-center divide-x-2 border-gray-200 text-black font-inter font-bold">
                                                Cantidad: <span class="px-3 py-1">{{ $cart['quantity'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start gap-5 items-center">
                                    <p
                                        class="font-inter font-bold text-text14 xl:text-text16 text-[#151515] flex justify-center items-center gap-2">
                                        S/
                                        <span>{{ number_format($cart['price'] - ($cart['discount'] / 100) * $cart['price'], 2) }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="flex flex-col gap-5 mt-10">
                        <div class="text-[#141718] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5 text-text16 md:text-text18"
                            data-aos="fade-up" data-aos-offset="150">
                            <p class="font-inter font-normal">Envío</p>
                            <p class="font-inter font-bold capitalize">{{ $type }}</p>
                        </div>

                        <div class="text-[#141718] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5 text-text16 md:text-text18"
                            data-aos="fade-up" data-aos-offset="150">
                            <p class="font-inter font-normal">Subtotal</p>
                            <p class="font-inter font-bold">S/ {{ number_format($subTotal, 2) }}</p>
                        </div>

                        <div class="text-[#141718] flex justify-between items-center border-b-[1px] border-[#E8ECEF] pb-5 text-text16 md:text-text18"
                            data-aos="fade-up" data-aos-offset="150">
                            <p class="font-inter font-normal">IGV (18%)</p>
                            <p class="font-inter font-bold">S/ {{ number_format($impuesto, 2) }}</p>
                        </div>

                        <div class="text-[#141718] font-inter font-medium text-text20 xl:text-text22 flex justify-between items-center pb-5"
                            data-aos="fade-up" data-aos-offset="150">
                            <p>Total</p>
                            <p>S/ {{ number_format($total, 2) }}</p>
                        </div>
                    </div>
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
