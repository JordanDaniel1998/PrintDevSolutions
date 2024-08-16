<section class="w-11/12 mx-auto flex flex-col gap-7 pt-10">

    <div class="flex flex-col items-start md:flex-row md:justify-between md:items-center gap-5">

        <h2 class="text-[#111111] text-text32 md:text-text36 font-inter font-bold w-1/2">Nuestras Categorías</h2>

        <div class="flex justify-start items-center">
            <a href="{{ route('catalogs.index') }}" class="flex justify-center items-center gap-2">
                <span class="text-text16 text-[#0051FF] md:text-text20 font-inter font-bold">Ver todas las
                    categorías</span>
                <div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19" stroke="#0051FF" stroke-width="1.33333" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 5L19 12L12 19" stroke="#0051FF" stroke-width="1.33333" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </a>
        </div>

    </div>

    <div class="grid grid-cols-1 grid-rows-1 lg:grid-cols-4 lg:grid-rows-2 gap-5 md:gap-12">

        @foreach ($totalSoldPerProductsCategories as $key => $totalSoldPerProduct)
            @if ($key < 1)
                <div class="col-span-1 lg:row-span-2 lg:col-span-2 bg-[#F3F3F3] p-5 md:p-10 flex flex-col gap-5 justify-center"
                    data-aos="fade-up" data-aos-offset="150">
                    <div class="flex flex-col gap-5 w-full">

                        <h2 class="text-text28 md:text-text32 font-inter font-bold w-1/2 capitalize">
                            {{ $totalSoldPerProduct->category_name }}
                        </h2>

                        <p class="font-inter font-normal text-text12 md:text-text16 capitalize">
                            {{ $totalSoldPerProduct->subTitle }}
                        </p>

                        <div>
                            <p class="font-inter font-normal text-text12 md:text-text16 text-[#111111]">Desde</p>
                            <p class="font-inter font-bold text-text20 md:text-text24 text-[#111111]">S/
                                {{ number_format($totalSoldPerProduct->price - ($totalSoldPerProduct->price*$totalSoldPerProduct->discount/100), 2) }}</p>
                        </div>
                    </div>

                    <div class="flex justify-end items-end md:items-center">
                        <img src="{{ asset('storage/uploads/' . $totalSoldPerProduct->imagen) }}" alt="impresora"
                            class="w-full h-auto object-cover">
                    </div>

                    <div class="flex justify-start items-center">
                        <a href="{{ route('productstoUser.index', $totalSoldPerProduct->product_id) }}"
                            class="flex justify-center items-center gap-2">
                            <span class="text-text16 text-[#0051FF] md:text-text20 font-inter font-bold">Ver
                                producto</span>
                            <div>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="#0051FF" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="#0051FF" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <div class="col-span-1 lg:row-span-1 lg:col-span-2 flex justify-between pl-5 py-5 md:p-10 md:gap-10 {{ $key == 2 ? 'bg-[#0051FF] text-white' : 'bg-[#F3F3F3] text-[#111111]' }}"
                    data-aos="fade-up" data-aos-offset="150">

                    <div class="flex flex-col gap-5 justify-center basis-3/6 md:basis-2/6">

                        <h2 class="text-text28 md:text-text32 font-inter font-bold capitalize">
                            {{ $totalSoldPerProduct->category_name }}
                        </h2>


                        <p class="font-inter font-normal text-text12 md:text-text16 capitalize">
                            {{ $totalSoldPerProduct->subTitle }} </p>
                        <div>
                            <p class="font-inter font-normal text-text12 md:text-text16">Desde</p>
                            <p class="font-inter font-bold text-text20 md:text-text24">S/
                                {{ number_format($totalSoldPerProduct->price - ($totalSoldPerProduct->price*$totalSoldPerProduct->discount/100), 2) }}</p>
                        </div>


                        <div class="flex justify-start items-center">
                            <a href="{{ route('productstoUser.index', $totalSoldPerProduct->product_id) }}" class="flex justify-center items-center gap-2">
                                <span class="text-text16 md:text-text20 font-inter font-bold {{ $key == 2 ? 'text-white' : 'text-[#0051FF]' }}">
                                    Ver producto
                                </span>
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="{{ $key == 2 ? '#ffffff' : '#0051FF' }}" stroke-width="1.33333"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 5L19 12L12 19" stroke="{{ $key == 2 ? '#ffffff' : '#0051FF' }}" stroke-width="1.33333"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-end items-end md:items-center basis-3/6 md:basis-4/6">
                        <img src="{{ asset('storage/uploads/' . $totalSoldPerProduct->imagen) }}" alt="impresora"
                            class="w-full h-auto object-cover">
                    </div>

                </div>
            @endif
        @endforeach



    </div>
</section>
