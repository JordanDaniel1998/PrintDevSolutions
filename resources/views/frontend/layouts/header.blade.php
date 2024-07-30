<header>
    <div class="bg-[#0051FF] py-5">
        <div class="flex justify-between items-center w-11/12 mx-auto text-white">
            <div>
                <p class="text-text12 md:text-text14 font-inter font-medium">Grandes dispositivos para grandes decisiones
                </p>
            </div>
            <div class="flex justify-center items-center gap-2">
                <div class="flex justify-center items-center gap-2">

                    <a target="_blank" href="https://{{ $informations->facebook }}" alt="facebook" class="cursor-pointer">
                        <img src="{{ asset('images/svg/svg_2.svg') }}" alt="facebook" class="cursor-pointer w-7 h-7"
                            loading="lazy">
                    </a>

                    <a target="_blank" href="https://{{ $informations->instagram }}">
                        <img src="{{ asset('images/svg/svg_1.svg') }}" alt="instagram" class="cursor-pointer w-7 h-7"
                            loading="lazy">
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Menu de navegación -->
    <nav class="w-11/12 mx-auto py-5">
        <div class="grid grid-rows-2 grid-cols-2 md:grid-cols-12 md:grid-rows-1">

            <div
                class="flex justify-start items-center row-span-1 col-span-1 md:row-span-1 md:col-span-1 order-1 md:order-1">
                <a href="{{ route('home') }}" class="flex justify-start items-center gap-2 font-inter font-bold italic">
                    <img src="{{ asset('images/svg/svg_3.svg') }}" alt="PrintDevSolutions" loading="lazy">
                    <span>PrintDev</span>
                </a>
            </div>

            <div
                class="flex justify-between md:justify-center md:gap-10 items-center row-span-1 col-span-2 md:row-span-1 md:col-span-9 order-3 md:order-2 text-text16 md:text-text20 font-medium">
                <a href="{{ route('home') }}"
                    class="relative {{ request()->routeIs('home') ? 'text-[#0051FF] after:block after:w-full after:h-[2px] after:bg-[#0051FF] after:absolute after:left-0 after:bottom-0' : '' }}">
                    Inicio
                </a>
                <a href="{{ route('catalogs.index') }}"
                    class="relative {{ request()->routeIs('catalogs.index') ? 'text-[#0051FF] after:block after:w-full after:h-[2px] after:bg-[#0051FF] after:absolute after:left-0 after:bottom-0' : '' }}">
                    Catálogo
                </a>
                @if ($isBlog)
                    <a href="{{ route('blogs.index') }}"
                        class="relative {{ request()->routeIs('blogs.index') ? 'text-[#0051FF] after:block after:w-full after:h-[2px] after:bg-[#0051FF] after:absolute after:left-0 after:bottom-0' : '' }}">
                        Blog
                    </a>
                @endif

                <a href="{{ route('about.index') }}"
                    class="relative {{ request()->routeIs('about.index') ? 'text-[#0051FF] after:block after:w-full after:h-[2px] after:bg-[#0051FF] after:absolute after:left-0 after:bottom-0' : '' }}">
                    Contáctanos
                </a>
            </div>

            <div
                class="flex justify-end items-center gap-2 row-span-1 col-span-1 md:row-span-1 md:col-span-2 order-2 md:order-4">

                @auth
                    <a href="{{ route('myAccount', auth()->user()->id) }}">
                        <img src="{{ auth()->user()->imagen_perfil ? asset('storage/users/' . auth()->user()->imagen_perfil) : asset('images/img/avatar.png') }}"
                            alt="login" class="cursor-pointer w-8 h-8 rounded-full">
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('images/svg/svg_5.svg') }}" alt="login" class="cursor-pointer">
                    </a>
                @endauth

                @if (!Route::is('carrito.index') && !Route::is('carrito.create'))
                    <img src="{{ asset('images/svg/svg_4.svg') }}" alt="bag" class="bag__carrito cursor-pointer">
                @endif


                <div class="flex justify-center items-center font-bold bg-[#0051FF] rounded-full w-5 h-5 p-4">
                    <span class="text-white">2</span>
                </div>
            </div>
        </div>
    </nav>
    <!-- Fin Menu de navegación -->

    <!-- Whattsapp -->
    <div class="flex justify-end w-11/12 mx-auto z-10">
        <div class="fixed bottom-6 sm:bottom-[2rem] lg:bottom-[4rem] z-20">
            <a target="_blank"
                href="https://api.whatsapp.com/send?phone={{ $informations->whatsapp }}&text={{ $informations->message_whatsapp }}"
                rel="noopener">
                <img src="{{ asset('images/svg/svg_6.svg') }}" alt="whatsapp" class="w-20 h-20 md:w-full md:h-full"
                    loading="lazy">
            </a>
        </div>
    </div>
    <!-- Fin Whattsapp -->

    <!-- Side Carrito -->

    <div class="modal" id="jsModalCarrito">
        <div class="modal__container">

            @livewire('shoppingcart.shopping-cart')

        </div>
    </div>

    {{-- <div class="modal" id="jsModalCarrito">
        <div class="modal__container">
            <div class="modal__info flex flex-col justify-between">
                <div class="modal__header">
                    <p class="font-moderat_Medium text-text28">Carrito</p>
                </div>
                <div class="modal__body">
                    <div class="modal__list">
                        <div class="flex justify-between border-b-[1px] pb-5">
                            <div class="flex justify-center items-center gap-2">
                                <div class="rounded-md p-4">
                                    <img src="" alt="producto" class="w-24" />
                                </div>
                                <div class="flex flex-col gap-3 py-2">
                                    <h3 class="font-moderat_Bold text-text14 md:text-text18 text-[#151515]">
                                        Producto 1
                                    </h3>
                                    <p class="font-moderat_Regular text-[12px] md:text-text16 text-[#6C7275]">
                                        Color: Black
                                    </p>
                                    <div class="flex justify-center text-[#151515]">
                                        <div>
                                            <input type="number"
                                                class="border-2 rounded-lg w-16 h-8 text-text16 font-moderat_Regular"
                                                value="01" step="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
                                <p class="font-moderat_Bold text-[14px] md:text-text18 text-[#151515]">
                                    s/ 19.19
                                </p>
                                <div>
                                    <a href="#">
                                        <img src="" alt="close" />
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal__footer">
                    <div class="flex flex-col gap-2 pt-36">
                        <div class="text-[#141718] flex justify-between items-center">
                            <p class="font-moderat_Regular text-[16px]">Subtotal</p>
                            <p class="font-moderat_Bold text-[16px]">s/ 99.00</p>
                        </div>

                        <div class="text-[#141718] font-moderat_Medium text-[20px] flex justify-between items-center">
                            <p>Total</p>
                            <p>s/ 234.00</p>
                        </div>
                        <div>
                            <a href=""
                                class="font-moderat_Bold text-base bg-[#0051FF] py-3 px-5 text-white cursor-pointer w-full inline-block text-center">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Fin Side Carrito -->
</header>
