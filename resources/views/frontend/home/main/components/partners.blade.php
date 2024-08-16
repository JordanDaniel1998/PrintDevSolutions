@if ($partners->count())
    <section class="w-full md:w-11/12 mx-auto bg-[#001232] text-white mt-20">
        <div class="flex flex-col gap-5 py-10 items-center w-11/12 mx-auto md:w-full" data-aos="fade-up" data-aos-offset="150">
            <h2 class="text-white font-inter font-bold text-text32 md:text-text44 text-center">Nuestras marcas
                asociadas
            </h2>
            <p class="font-inter font-normal text-text16 md:text-text20 text-center w-full md:w-2/3">Descubre una selección de logotipos de nuestros clientes, representando empresas innovadoras y líderes en sus respectivas industrias. Cada logo refleja la confianza y colaboración que hemos construido con ellos a lo largo del tiempo.</p>
        </div>

        <div class="swiper swiper_slider_partners w-full md:w-10/12 mx-auto" data-aos="fade-up" data-aos-offset="150">
            <div class="swiper-wrapper pt-5 pb-10 items-center">
                @foreach ($partners as $partner)
                    <div class="swiper-slide items-center">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/partners/' . $partner->imagen) }}" alt="{{ $partner->title }}" loading="lazy">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
