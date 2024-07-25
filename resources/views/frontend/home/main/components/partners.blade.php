@if ($partners->count())
    <section class="w-full md:w-11/12 mx-auto bg-[#001232] text-white mt-20">
        <div class="flex flex-col gap-5 py-10 items-center w-11/12 mx-auto md:w-full" data-aos="fade-up" data-aos-offset="150">
            <h2 class="text-white font-inter font-bold text-text32 md:text-text44 text-center">Nuestras marcas
                asociadas
            </h2>
            <p class="font-inter font-normal text-text16 md:text-text20 text-center w-full md:w-2/3">Lorem ipsum
                dolor
                sit
                amet, consectetur adipiscing elit. Vivamus eu fermentum justo, ac fermentum nulla. Sed sed
                scelerisque
                urna, vitae ultrices libero. Pellentesque vehicula et urna in venenatis.</p>
        </div>

        <div class="swiper swiper_slider_partners w-full md:w-10/12 mx-auto" data-aos="fade-up" data-aos-offset="150">
            <div class="swiper-wrapper pt-5 pb-10 items-center">
                @foreach ($partners as $partner)
                    <div class="swiper-slide items-center">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/partners/' . $partner->imagen) }}" alt="{{ $partner->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
