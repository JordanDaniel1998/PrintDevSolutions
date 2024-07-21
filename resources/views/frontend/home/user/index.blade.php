@extends('frontend.layouts.app')

@section('contenido')
    <section>
        <div class="mb-0 md:my-5">
            <div class="flex flex-col w-11/12 mx-auto">
                <div class="flex flex-col gap-10 my-5" data-aos="fade-up" data-aos-offset="150">
                    <div class="flex gap-2 text-text14 xl:text-text18 justify-start items-center">
                        <a href="{{ route('home') }}" class="font-medium font-inter text-[#565656]">Home</a>
                        <img src="{{ asset('images/svg/svg_13.svg') }}" alt="upload photo" loading="lazy" />
                        <a href="{{ route('myAccount', $user->id) }}" class="font-bold font-inter text-[#111111]">Mi
                            cuenta</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8 md:mb-16">
            <div class="flex flex-col gap-12 md:flex-row lg:gap-28 w-full md:w-11/12 mx-auto">
                <div class="bg-white py-5 md:py-0 basis-5/12">
                    <div class="w-11/12 md:w-full mx-auto">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                                <div class="rounded-full w-24 h-24 bg-[#E9EDEF] flex justify-center items-center relative">
                                    <img src="{{ $user->imagen_perfil ? asset('storage/users/' . $user->imagen_perfil) : asset('images/img/avatar.png') }}"
                                        alt="{{ $user->name }}" class="rounded-full w-24 h-24">
                                </div>

                                <div class="text-[#111111]">
                                    <p class="font-bold font-inter text-text24 md:text-text28">
                                        {{ $user->name }}
                                    </p>

                                    <p class="font-medium font-inter text-text12 md:text-text16 text-[#8896A8]">
                                        {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">

                                <a href="{{ route('myAccount', $user->id) }}"
                                    class="{{ request()->routeIs('myAccount', $user->id) ? 'bg-[#0051FF] text-white' : 'text-[#565656]' }} font-bold font-inter text-text16 md:text-text18 flex justify-between items-center w-full md:w-80 transition-all duration-300 py-3 px-5">
                                    Mi cuenta
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                                                fill="#E9EDEF" />
                                        </svg>
                                    </span>
                                </a>

                                <a href="{{ route('myAccount.direction', $user->id) }}"
                                    class="{{ request()->routeIs('myAccount.direction', $user->id) ? 'bg-[#0051FF] text-white' : 'text-[#565656]' }} font-bold font-inter text-text16 md:text-text18 flex justify-between items-center w-full md:w-80 transition-all duration-300 py-3 px-5">
                                    Dirección
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                                                fill="#E9EDEF" />
                                        </svg>
                                    </span>
                                </a>

                                <a href="{{ route('myAccount.orders', $user->id) }}"
                                    class="{{ request()->routeIs('myAccount.orders', $user->id) ? 'bg-[#0051FF] text-white' : 'text-[#565656]' }} font-bold font-inter text-text16 md:text-text18 flex justify-between items-center w-full md:w-80  transition-all duration-300 py-3 px-5">
                                    Historial de pedidos
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.332031 6.50048C0.332031 2.93378 3.3187 0.0390626 6.9987 0.0390628C10.6787 0.039063 13.6654 2.93378 13.6654 6.50048C13.6654 10.0672 10.6787 12.9619 6.9987 12.9619C3.3187 12.9619 0.332031 10.0672 0.332031 6.50048ZM8.76536 6.27433L6.90536 4.47159C6.69203 4.26483 6.33203 4.40698 6.33203 4.69774L6.33203 8.30967C6.33203 8.60044 6.69203 8.74259 6.8987 8.53582L8.7587 6.73309C8.89203 6.60386 8.89203 6.39709 8.76536 6.27433Z"
                                                fill="#E9EDEF" />
                                        </svg>
                                    </span>
                                </a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-[#F3F5F7] text-[#151515] font-bold font-inter text-text16 md:text-text18 py-3 px-4 flex justify-between items-center md:w-80 mt-0 md:mt-[200px] w-full">
                                        <span>Cerrar Sesión</span>
                                        <img src="{{ asset('images/svg/svg_12.svg') }}" alt="cerrar" loading="lazy" />
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-7/12 w-11/12 md:w-full mx-auto" data-aos="fade-up" data-aos-offset="150">

                    <livewire:users.edit-user :user="$user" />
                    {{--  --}}

                    {{-- <livewire:edit-user :user="$user" /> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
