@extends('frontend.layouts.app')

@section('contenido')
    <section>
        <div class="grid grid-cols-1 place-items-center lg:grid-cols-2 w-11/12 mx-auto gap-20 pb-10 lg:pb-0">
            <div class="w-full mx-auto hidden lg:block">
                <img src="{{ asset('images/img/image_4.png') }}" alt="PrintDev" class="w-full" loading="lazy">
            </div>

            <div class="w-full lg:max-w-[600px] my-auto flex flex-col gap-10 py-12 md:py-0">
                <div class="flex flex-col gap-3">
                    <p class="font-medium font-inter text-[#0051FF] text-text16 md:text-text18">Hola ...</p>
                    <p class="font-bold font-inter text-text36 text-[#111111] leading-[36px] w-full md:w-2/3">Bienvenido de
                        nuevo</p>
                    <p class="font-normal font-inter text-text14 md:text-text16">Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>

                <div>
                    @if (session()->has('mensaje'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                            class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5" novalidate>
                        @csrf
                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="email_login" :value="__('Email')" />
                            <x-text-input id="email_login" type="email" required autocomplete="Correo Electrónico"
                                placeholder="Correo electrónico" name="email" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" type="password" required autocomplete="Contraseña"
                                placeholder="*******" name="password" />
                        </div>

                        <div class="flex justify-between items-center" data-aos="fade-up" data-aos-offset="150">

                            <div>
                                <a href="{{ route('register') }}"
                                    class="font-medium font-inter text-text14 md:text-text16 text-[#565656]">Crear Cuenta</a>
                            </div>

                            <div class="flex justify-start items-center gap-2">
                                <img src="{{ asset('images/svg/svg_10.svg') }}" alt="password" loading="lazy">
                                <a href=""
                                    class="text-[#0051FF] font-medium font-inter text-text14 md:text-text16">Olvide mi
                                    contraseña</a>
                            </div>
                        </div>


                        <div class="w-full pt-10">
                            <input type="submit"
                                class="bg-[#0051FF] text-white font-bold font-inter py-3 text-center text-text16 md:text-text18 w-full inline-block cursor-pointer"
                                value="Ingresar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
