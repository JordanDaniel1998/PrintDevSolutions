@if ($features->count() > 0)
    <section class="w-11/12 md:w-10/12 mx-auto pt-10 pb-16 md:pt-16 md:pb-24">
        <div class="flex flex-col gap-5">
            <div class="flex flex-col items-start md:flex-row md:justify-start md:items-center py-5 gap-2">
                <p class="font-inter font-bold text-text32 md:text-text36">Productos Destacados</p>
                <div class="flex md:hidden justify-start items-center">
                    <a href="{{ route('catalogs.index') }}" class="flex flex-row justify-center items-center gap-2">
                        <p
                            class="text-[#3374FF] text-text16 font-inter font-bold md:text-text20 flex justify-center items-center gap-3">
                            Ver todo
                        </p>
                        <div>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19" stroke="#3374FF" stroke-width="1.33333" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="#3374FF" stroke-width="1.33333"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-5">
                @foreach ($features as $product)
                    <div class="flex flex-col gap-5 justify-between" data-aos="fade-up" data-aos-offset="150">
                        <div class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative">
                            <div class="flex justify-start items-center absolute top-[5%] left-[5%] gap-2">
                                @if ($product->destacado)
                                    <span
                                        class="font-inter font-medium text-text10 md:text-text20 bg-[#0051FF] text-white py-1 px-2">
                                        Nuevo
                                    </span>
                                @endif
                                @if ($product->discount > 0)
                                    <span
                                        class="font-inter font-m text-text10 md:text-text20 bg-[#0051FF] text-white py-1 px-2">-{{ $product->discount }}%</span>
                                @endif
                            </div>

                            <div class="flex justify-center items-center py-10 md:py-20">

                                <a href="{{ route('productstoUser.index', $product->id) }}">
                                    <img src="{{ asset('storage/uploads/' . $product->imagen) }}" alt="impresora"
                                        class="size-[100px] md:size-[200px]">
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col gap-3">
                                <h3 class="font-inter font-medium text-text12 md:text-text20 text-[#1F1F1F]">
                                    {{ $product->categorie->name }}
                                </h3>
                                <a href="{{ route('productstoUser.index', $product->id) }}">
                                    <h2 class="font-inter font-bold text-text16 md:text-text28 text-[#111111]">
                                        {{ $product->title }}
                                    </h2>
                                </a>
                                <p class="font-inter font-normal text-text12 md:text-text20 text-[#565656]">
                                    {{ $product->subTitle }}
                                </p>
                                @if ($product->attributes->contains('codigo', '!==', null))
                                    <div class="flex justify-start items-center gap-2 md:gap-4">
                                        @foreach ($product->attributes as $attribute)
                                            @if ($attribute->codigo)
                                                <div class="rounded-full w-4 h-4 md:w-6 md:h-6"
                                                    style="background-color: {{ $attribute->codigo ? $attribute->codigo : '#EC008C' }};">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div>
                                @if ($product->discount > 0)
                                    <p class="italic font-inter font-normal text-[12px] md:text-sm">
                                        Antes: <span class="line-through">S/
                                            {{ number_format($product->price, 2) }}</span>
                                    </p>
                                @endif
                                <p class="text-[#111111] text-text24 md:text-text28 font-bold md:font-medium">
                                    S/
                                    {{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
