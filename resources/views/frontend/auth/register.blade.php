@extends('frontend.layouts.app')

@section('contenido')
    <section>
        <div class="grid grid-cols-1 place-items-center lg:grid-cols-2 w-11/12 mx-auto gap-20 pb-10 lg:pb-0">
            <div class="w-full mx-auto hidden lg:block">
                <img src="{{ asset('images/img/image_1.png') }}" alt="PrintDev" class="w-full">
            </div>

            <div class="w-full lg:max-w-[600px] flex flex-col gap-10 py-12 md:py-0">
                <div class="flex flex-col gap-3">
                    <p class="font-medium font-inter text-[#0051FF] text-text16 md:text-text18">Vamos a crear</p>
                    <p class="font-bold font-inter text-text36 text-[#111111] leading-[36px] w-full md:w-2/3">Crear una nueva
                        cuenta</p>
                    <p class="font-normal font-inter text-text14 md:text-text16">Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>

                <div>
                    <form action="{{ route('register') }}" method="POST" id="formCrearCuenta" class="flex flex-col gap-5" novalidate>
                        @csrf
                        <div class="flex flex-col lg:flex-row justify-center items-center gap-5">
                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label for="name" :value="__('Nombres')" />
                                <x-text-input id="name" type="text" required autocomplete="Nombres"
                                    placeholder="Nombres" name="name" :value="old('name')"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label for="last" :value="__('Apellidos')" />
                                <x-text-input id="last" type="text" required autocomplete="Apellidos"
                                    placeholder="Apellidos" name="last" :value="old('last')"/>
                                <x-input-error :messages="$errors->get('last')" class="mt-2" />
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="email_login" :value="__('Email')" />
                            <x-text-input id="email_login" type="email" required autocomplete="Correo Electrónico"
                                placeholder="Correo electrónico" name="email" :value="old('email')"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" type="password" required autocomplete="Contraseña"
                                placeholder="*******" name="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                                <x-text-input id="password_confirmation" type="password" required autocomplete="Contraseña"
                                    placeholder="*******" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="w-full pt-10">
                            <input type="submit" class="bg-[#0051FF] text-white font-bold font-inter py-3 text-center text-text16 md:text-text18 w-full inline-block cursor-pointer" value="Crear Cuenta">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/carrito.js'])
@endpush
