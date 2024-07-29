<div>
    @livewire('catalogs.show-catalogs')

    <div>
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-10">
            @foreach ($products as $product)
                <div class="flex flex-col gap-5" {{-- data-aos="fade-up" data-aos-offset="150" --}}>
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
                                    class="font-inter font-m text-text10 md:text-text20 bg-[#0051FF] text-white py-1 px-2">{{ $product->discount }}%</span>
                            @endif
                        </div>

                        <div class="flex justify-center items-center py-10 md:py-20">

                            <a href="{{ route('productstoUser.index', $product->id) }}">
                                <img src="{{ asset('storage/uploads/' . $product->imagen) }}" alt="impresora"
                                    class="w-[200px] h-[200px]">
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
                            <div class="flex justify-start items-center gap-2 md:gap-4">
                                @foreach ($product->attributes as $attribute)
                                    <div class="rounded-full w-4 h-4 md:w-6 md:h-6"
                                        style="background-color: {{ $attribute->codigo ? $attribute->codigo : '#EC008C' }};">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <p
                            class="text-[#111111] text-text16 md:text-text28 font-space_grotesk font-bold md:font-medium">
                            S/ {{ $product->price }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div data-aos="fade-up" data-aos-offset="150" class="py-10">

        <div class="flex items-center gap-2 justify-center md:justify-end">
            {{ $products->links() }}
        </div>
    </div>
</div>
