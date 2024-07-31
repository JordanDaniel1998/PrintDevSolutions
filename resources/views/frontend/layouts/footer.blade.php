<footer class="bg-[#0051FF] py-20">
    <div class="flex justify-between items-center text-white w-11/12 mx-auto gap-12" data-aos="fade-up"
        data-aos-offset="150">

        <div class="flex flex-col gap-5">
            <div class="flex items-center justify-start font-inter font-bold italic">
                <a href="{{ route('home') }}"> <img src="{{ asset('images/svg/svg_7.svg') }}" alt="PrintDevSolutions"
                        loading="lazy"></a>
                <span>PrintDev</span>
            </div>
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 justify-start items-start">
                    <img src="{{ asset('images/svg/svg_8.svg') }}" alt="direccion" loading="lazy" class="w-5 h-5">
                    <p class="font-normal font-inter text-text12 md:text-text14">
                        {{ $informations->address }} - {{ $informations->inside }}, {{ $informations->district }} -
                        {{ $informations->country }}
                    </p>
                </div>

                <div class="flex gap-2 justify-start items-start">
                    <img src="{{ asset('images/svg/svg_9.svg') }}" alt="email" loading="lazy" class="w-5 h-5">
                    <p class="font-normal font-inter text-text12 md:text-text14">{{ $informations->email }}</p>
                </div>

                <div class="flex gap-2 justify-start items-start">

                    <a target="_blank" href="https://{{ $informations->facebook }}">
                        <img src="{{ asset('images/svg/svg_2.svg') }}" alt="facebook" loading="lazy"
                            class="cursor-pointer w-7 h-7">
                    </a>

                    <a target="_blank" href="https://{{ $informations->instagram }}">
                        <img src="{{ asset('images/svg/svg_1.svg') }}" alt="instagram" loading="lazy"
                            class="cursor-pointer w-7 h-7">
                    </a>
                </div>
            </div>
        </div>


        <div class="flex flex-col gap-5">
            <p class="underline font-medium font-inter text-text14 md:text-text16">Menú</p>
            <a href="" class="font-normal font-inter text-text12 md:text-text14">Inicio</a>
            <a href="" class="font-normal font-inter text-text12 md:text-text14">Nosotros</a>
            <a href="" class="font-normal font-inter text-text12 md:text-text14">Productos</a>
            <a href="" class="font-normal font-inter text-text12 md:text-text14">Blog</a>
            <a href="" class="font-normal font-inter text-text12 md:text-text14">Contáctanos</a>
        </div>

        <div class="flex flex-col gap-5">
            <p class="underline font-medium font-inter text-text14 md:text-text16">Términos de uso</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de privacidad</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de envío</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de devolución</p>
        </div>



        {{-- <div class="flex flex-col gap-5">
            <p class="font-bold font-inter text-text24 md:text-text28">Suscribete a nuestro blog</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Mantente actualizado sobre las últimas noticias y
                ofertas.</p>
                @livewire('subscribers.create-subscriber')
        </div> --}}

    </div>
</footer>
