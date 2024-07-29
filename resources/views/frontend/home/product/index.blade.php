@extends('frontend.layouts.app')

@section('contenido')

{{-- <section class="w-11/12 md:w-10/12 mx-auto pt-5 flex flex-col gap-10 md:gap-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16">
        <div class="flex flex-col md:flex-row justify-center items-center gap-5 md:gap-0">
            <div
                class="flex flex-row justify-between md:flex-col md:justify-start md:items-center h-full md:gap-10 md:basis-1/4 order-2 md:order-1 w-full">
                    @foreach ($product->files as $galery)
                        <img src="{{ asset('storage/uploads/' . $galery->imagen) }}" alt="{{ $product->title }}" class="w-[70px] h-[90px] object-cover"
                        data-aos="fade-up" data-aos-offset="150">
                    @endforeach
            </div>

            <div class="md:basis-3/4 flex justify-center items-center order-1 md:order-2 w-full h-full">
                <img src="{{ asset('storage/uploads/' . $product->imagen) }}" alt="computer" class="w-full h-full object-cover"
                    data-aos="fade-up" data-aos-offset="150">
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <div class="flex flex-col gap-5 pb-10 border-b-2 border-[#DDDDDD]" data-aos="fade-up" data-aos-offset="150">
                <h2 class="font-inter font-bold text-text40 md:text-text44 text-[#111111]">{{ $product->title }}</h2>
                <p class="font-inter font-bold text-text24 md:text-text28 text-[#111111]">S/ {{ $product->price }}</p>
                <div class="flex justify-start items-center gap-5">
                    <p class="font-inter font-bold text-text16 md:text-text20 text-[#1F1F1F]"> @choice('Color|Colores', $product->attributes->count()):</p>
                    <div class="flex justify-start items-center gap-4">
                        @foreach ($product->attributes as $attribute)
                            <div class="rounded-full w-4 h-4 md:w-6 md:h-6"
                                style="background-color: {{ $attribute->codigo ? $attribute->codigo : '#EC008C' }};">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <input type="number" class="border-2 rounded-lg w-16" value="01" step="1">
                </div>

                <p class="text-[#565656] text-text16 md:text-text20 font-inter font-normal">
                    {{ $product->description_short }}
                </p>

                <div class="flex justify-between items-center text-white font-inter font-bold text-text14 md:text-text16 gap-5 pt-3"
                    data-aos="fade-up" data-aos-offset="150">
                    <a href="#" class="bg-[#0051FF] w-full py-3 px-2 md:px-10 text-center">Quiero comprar</a>
                    <a href="#"
                        class="bg-[#25D366] flex justify-center items-center w-full py-3 px-2 md:px-10 text-center gap-2">
                        <span>Cotizar aquí</span>
                        <div>
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.1 2.3C12.6 0.8 10.6 0 8.5 0C4.1 0 0.5 3.6 0.5 8C0.5 9.4 0.900006 10.8 1.60001 12L0.5 16L4.70001 14.9C5.90001 15.5 7.2 15.9 8.5 15.9C12.9 15.9 16.5 12.3 16.5 7.9C16.5 5.8 15.6 3.8 14.1 2.3ZM8.5 14.6C7.3 14.6 6.10001 14.3 5.10001 13.7L4.89999 13.6L2.39999 14.3L3.10001 11.9L2.89999 11.6C2.19999 10.5 1.89999 9.3 1.89999 8.1C1.89999 4.5 4.9 1.5 8.5 1.5C10.3 1.5 11.9 2.2 13.2 3.4C14.5 4.7 15.1 6.3 15.1 8.1C15.1 11.6 12.2 14.6 8.5 14.6ZM12.1 9.6C11.9 9.5 10.9 9 10.7 9C10.5 8.9 10.4 8.9 10.3 9.1C10.2 9.3 9.80001 9.7 9.70001 9.9C9.60001 10 9.49999 10 9.29999 10C9.09999 9.9 8.50001 9.7 7.70001 9C7.10001 8.5 6.70001 7.8 6.60001 7.6C6.50001 7.4 6.60001 7.3 6.70001 7.2C6.80001 7.1 6.9 7 7 6.9C7.1 6.8 7.10001 6.7 7.20001 6.6C7.30001 6.5 7.20001 6.4 7.20001 6.3C7.20001 6.2 6.80001 5.2 6.60001 4.8C6.50001 4.5 6.30001 4.5 6.20001 4.5C6.10001 4.5 5.99999 4.5 5.79999 4.5C5.69999 4.5 5.49999 4.5 5.29999 4.7C5.09999 4.9 4.60001 5.4 4.60001 6.4C4.60001 7.4 5.29999 8.3 5.39999 8.5C5.49999 8.6 6.79999 10.7 8.79999 11.5C10.5 12.2 10.8 12 11.2 12C11.6 12 12.4 11.5 12.5 11.1C12.7 10.6 12.7 10.2 12.6 10.2C12.5 9.7 12.3 9.7 12.1 9.6Z"
                                    fill="white" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>


            <div class="pt-5" data-aos="fade-up" data-aos-offset="150">
                <p class="font-inter font-medium text-text14 md:text-text16 text-[#111111]">
                    Categoría: <span
                        class="text-[#565656] font-inter font-normal text-text14">{{ $product->categorie->name }}</span>
                </p>
                <p class="font-inter font-medium text-text14 md:text-text16 text-[#111111]">
                    SKU: <span class="text-[#565656] font-inter font-normal text-text14">{{ $product->sku }}</span>
                </p>
                <p class="font-inter font-medium text-text14 md:text-text16 text-[#111111]">
                    Marca: <span
                        class="text-[#565656] font-inter font-normal text-text14">{{ $product->brand->name }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">

        <h3 class="font-inter font-bold text-text28 md:text-text32 text-[#111111]">Descripción</h3>
        <div class="text-[#565656] text-text16 md:text-text20 font-inter font-normal flex flex-col gap-5">
            <p>
                {{ $product->description }}
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-5">
        <h3 class="font-inter font-bold text-text28 md:text-text32 text-[#111111]">Características técnicas</h3>
        <div class="mx-6" data-aos="fade-up" data-aos-offset="150">
            <ul class="font-inter font-normal text-text16 md:text-text20 list-disc text-[#565656]">
                @foreach ($product->specifications as $specification)
                <li><span class="font-bold">{{ $specification->specification_key }}</span>: {{ $specification->specification_value }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section> --}}
        @livewire('products.product-item', ['product' => $product])

   {{--  <section class="w-11/12 md:w-10/12 mx-auto pt-10 pb-16 md:pt-16 md:pb-24">
        <div class="flex flex-col gap-5">
            <div class="flex flex-col items-start md:flex-row md:justify-start md:items-center py-5 gap-2">
                <p class="font-inter font-bold text-text32 md:text-text36">Productos relacionados</p>
                <div class="flex md:hidden justify-start items-center">
                    <a href="#" class="flex flex-row justify-center items-center gap-2">
                        <p
                            class="text-[#3374FF] text-text16 font-inter font-bold md:text-text20 flex justify-center items-center gap-3">
                            Ver todo
                        </p>
                        <div>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19" stroke="#3374FF" stroke-width="1.33333" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="#3374FF" stroke-width="1.33333" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-5">
                <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                    <div class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">
                            <span
                                class="font-inter font-medium text-text10 md:text-text20 bg-[#0051FF] text-white py-1 px-2">
                                Lanzamiento</span>
                        </div>
                        <div class="flex justify-center items-center py-10 md:py-20">
                            <a href=""><img src="{{ asset('images/img/image_17.png') }}" alt="impresora"
                                    class="w-[120px] h-[90px] md:w-auto md:h-auto"></a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-3">
                            <h3 class="font-inter font-medium text-text12 md:text-text20 text-[#1F1F1F]">Tintas</h3>
                            <a href="">
                                <h2 class="font-inter font-bold text-text16 md:text-text28 text-[#111111]">Tintas HP</h2>
                            </a>
                            <p class="font-inter font-normal text-text12 md:text-text20 text-[#565656]">Praesent non
                                euismod
                                arcu, eu dignissim erat. Aliquam erat volutpat...</p>
                            <div class="flex justify-start items-center gap-2 md:gap-4">
                                <div class="rounded-full bg-[#00AEEF] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#EC008C] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#FFF200] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#000000] w-4 h-4 md:w-6 md:h-6"></div>
                            </div>
                        </div>
                        <p class="text-[#111111] text-text16 md:text-text28 font-space_grotesk font-bold md:font-medium">S/
                            899.99</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                    <div class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative">
                        <div class="flex justify-center items-center py-10 md:py-20">
                            <a href=""><img src="{{ asset('images/img/image_17.png') }}" alt="impresora"
                                    class="w-[120px] h-[90px] md:w-auto md:h-auto"></a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-3">
                            <h3 class="font-inter font-medium text-text12 md:text-text20 text-[#1F1F1F]">Tintas</h3>
                            <a href="">
                                <h2 class="font-inter font-bold text-text16 md:text-text28 text-[#111111]">Tintas HP</h2>
                            </a>
                            <p class="font-inter font-normal text-text12 md:text-text20 text-[#565656]">Praesent non
                                euismod
                                arcu, eu dignissim erat. Aliquam erat volutpat...</p>
                            <div class="flex justify-start items-center gap-2 md:gap-4">
                                <div class="rounded-full bg-[#00AEEF] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#EC008C] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#FFF200] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#000000] w-4 h-4 md:w-6 md:h-6"></div>
                            </div>
                        </div>
                        <p class="text-[#111111] text-text16 md:text-text28 font-space_grotesk font-bold md:font-medium">S/
                            899.99</p>
                    </div>
                </div>


                <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                    <div class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative">
                        <div class="flex justify-start items-center absolute top-[5%] left-[5%]">
                            <span
                                class="font-inter font-medium text-text10 md:text-text20 bg-[#0051FF] text-white py-1 px-2">-20%</span>
                        </div>
                        <div class="flex justify-center items-center py-10 md:py-20">
                            <a href=""><img src="{{ asset('images/img/image_17.png') }}" alt="impresora"
                                    class="w-[120px] h-[90px] md:w-auto md:h-auto"></a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-3">
                            <h3 class="font-inter font-medium text-text12 md:text-text20 text-[#1F1F1F]">Tintas</h3>
                            <a href="">
                                <h2 class="font-inter font-bold text-text16 md:text-text28 text-[#111111]">Tintas HP</h2>
                            </a>
                            <p class="font-inter font-normal text-text12 md:text-text20 text-[#565656]">Praesent non
                                euismod
                                arcu, eu dignissim erat. Aliquam erat volutpat...</p>
                            <div class="flex justify-start items-center gap-2 md:gap-4">
                                <div class="rounded-full bg-[#00AEEF] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#EC008C] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#FFF200] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#000000] w-4 h-4 md:w-6 md:h-6"></div>
                            </div>
                        </div>
                        <p class="text-[#111111] text-text16 md:text-text28 font-space_grotesk font-bold md:font-medium">S/
                            899.99</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                    <div class="bg-[#F3F3F3] flex flex-col justify-center pt-5 gap-20 relative">
                        <div class="flex justify-center items-center py-10 md:py-20">
                            <a href=""><img src="{{ asset('images/img/image_17.png') }}" alt="impresora"
                                    class="w-[120px] h-[90px] md:w-auto md:h-auto"></a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-3">
                            <h3 class="font-inter font-medium text-text12 md:text-text20 text-[#1F1F1F]">Tintas</h3>
                            <a href="">
                                <h2 class="font-inter font-bold text-text16 md:text-text28 text-[#111111]">Tintas HP</h2>
                            </a>
                            <p class="font-inter font-normal text-text12 md:text-text20 text-[#565656]">Praesent non
                                euismod
                                arcu, eu dignissim erat. Aliquam erat volutpat...</p>
                            <div class="flex justify-start items-center gap-2 md:gap-4">
                                <div class="rounded-full bg-[#00AEEF] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#EC008C] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#FFF200] w-4 h-4 md:w-6 md:h-6"></div>
                                <div class="rounded-full bg-[#000000] w-4 h-4 md:w-6 md:h-6"></div>
                            </div>
                        </div>
                        <p class="text-[#111111] text-text16 md:text-text28 font-space_grotesk font-bold md:font-medium">S/
                            899.99</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
