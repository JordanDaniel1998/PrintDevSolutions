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
                <div class="bg-white py-5 md:py-0 basis-4/12">
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

                                {{--  <a href="{{ route('myAccount.direction', $user->id) }}"
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
                            </a> --}}

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
                <div class="basis-8/12 w-11/12 md:w-full mx-auto" data-aos="fade-up" data-aos-offset="150">
                    {{-- <livewire:users.historial-pedido /> --}}
                    @if($orders->count() > 0)
                        <div class="flex flex-col gap-5">

                            <div class="flex flex-col gap-24">
                                @foreach ($orders as $order)
                                    <div>
                                        <div>
                                            <p class="font-bold font-inter text-lg">Fecha de compra:
                                                <span
                                                    class="font-normal">{{ $order->created_at->translatedFormat('d \d\e F \d\e Y') }}</span>
                                            </p>
                                            <p class="font-bold font-inter text-lg">Tipo de envío:
                                                <span class="font-normal first-letter">
                                                    @if ($order->type == 'express')
                                                    Express - S/ <span> {{  number_format(0.05*$order->subTotal, 2) }}</span>
                                                    @else
                                                        Recoger en tienda - S/ <span> {{  number_format(0.00*$order->subTotal, 2) }}</span>
                                                    @endif
                                                </span>

                                            </p>

                                            <p class="font-bold font-inter text-lg">Monto total:
                                                <span class="font-normal">
                                                    S/ {{ number_format($order->total_amount, 2) }}
                                                </span>
                                            </p>
                                        </div>
                                        @foreach ($order->orderItems as $item)
                                            <div data-aos="fade-up" data-aos-offset="150"
                                                class="flex flex-col xl:flex-row pb-8 border-b-[2px] border-[#E8ECEF] gap-5">
                                                <div class="w-full basis-5/12">
                                                    <p
                                                        class="font-inter font-bold text-text14 xl:text-text18 text-[#141718] text-left py-4">
                                                        Producto
                                                    </p>

                                                    <div class="flex justify-start md:justify-center items-center gap-5">
                                                        <div
                                                            class="h-full w-full flex justify-center basis-1/3 md:basis-1/2 items-center bg-[#F3F3F3] p-5">
                                                            <a href="{{ route('productstoUser.index', $item->product->id) }}"
                                                                class="w-[120px] inline-block">
                                                                <img src="{{ asset('storage/uploads/' . $item->product->imagen) }}"
                                                                    alt="producto" class="w-[120px] object-cover" />
                                                            </a>
                                                        </div>

                                                        <div
                                                            class="flex flex-col gap-2 basis-2/3 md:basis-1/2 md:flex-1 items-start">
                                                            <h3
                                                                class="font-inter font-bold text-text16 xl:text-text18 text-[#151515] text-left">
                                                                {{ $item->product->title }}
                                                            </h3>
                                                            @if ($item->color)
                                                                <p
                                                                    class="font-inter font-normal text-[12px] md:text-text16 text-[#6C7275] flex justify-start items-center gap-2 text-left">
                                                                    Color: <span class="w-5 h-5 inline-block rounded-full border-2"
                                                                        style="background-color: {{ $item->color ? $item->color : '' }};"></span>
                                                                </p>
                                                            @endif
                                                            <p
                                                                class="font-inter font-normal text-text12 xl:text-text14 text-[#6C7275] text-left">
                                                                SKU: {{ $item->product->sku }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex gap-10 w-full text-center basis-7/12">
                                                    <div class="flex-1">
                                                        <p
                                                            class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                                            Cantidad
                                                        </p>

                                                        <div class="flex justify-center text-[#151515] xl:pt-8">
                                                            <div class="w-8 h-8 flex justify-center items-center flex-1">
                                                                <span class="font-inter font-bold text-text14 md:text-text18">
                                                                    {{ $item->quantity }} </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-1">
                                                        <p
                                                            class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                                            Precio
                                                        </p>
                                                        <p
                                                            class="font-inter font-bold text-text14 md:text-text18 text-[#151515] xl:pt-8">
                                                            S/ {{ $item->price_sale }} </span>
                                                        </p>
                                                    </div>

                                                    <div class="flex-1">
                                                        <p
                                                            class="font-inter font-bold text-text14 md:text-text18 text-[#141718] pt-4 pb-6">
                                                            Sub Total
                                                        </p>
                                                        <p
                                                            class="font-inter font-bold text-text14 md:text-text18 text-[#151515] xl:pt-8">
                                                            S/
                                                            {{ $item->price_sale * $item->quantity }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col gap-5 pt-8 pb-5 md:pb-10">
                                <div data-aos="fade-up" data-aos-offset="150">
                                    <a href="{{ route('catalogs.index') }}"
                                        class="text-white bg-[#0051FF] w-full py-3 cursor-pointer font-moderat_Bold text-text18 md:text-text20 inline-block text-center">Seguir
                                        comprando</a>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
