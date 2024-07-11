<footer class="bg-[#0051FF] py-20">
    <div class="grid grid-cols-1 lg:grid-cols-4 text-white w-11/12 mx-auto gap-12" data-aos="fade-up"
        data-aos-offset="150">

        <div class="flex flex-col gap-5">
            <div class="flex items-center justify-start font-inter font-bold italic">
                <a href=""> <img src="{{ asset('images/svg/svg_7.svg') }}" alt="PrintDevSolutions" loading="lazy"></a>
                <span>PrintDev</span>
            </div>
            <div class="flex flex-col gap-5">
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('images/svg/svg_8.svg') }}" alt="direccion" loading="lazy" class="w-5 h-5">
                    <p class="font-normal font-inter text-text12 md:text-text14">
                        Av. Camino Real 356 - San Isidro. Lima -
                        Perú
                    </p>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('images/svg/svg_9.svg') }}" alt="email" loading="lazy" class="w-5 h-5">
                    <p class="font-normal font-inter text-text12 md:text-text14">soporte@micjc.com.pe</p>
                </div>

                <div class="flex gap-2 items-center">

                    <a target="_blank" href="">
                        <img src="{{ asset('images/svg/svg_2.svg') }}" alt="facebook" loading="lazy" class="cursor-pointer w-7 h-7">
                    </a>


                    <a target="_blank" href="">
                        <img src="{{ asset('images/svg/svg_1.svg') }}" alt="instagram" loading="lazy" class="cursor-pointer w-7 h-7">
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <p class="underline font-medium font-inter text-text14 md:text-text16">Términos de uso</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de privacidad</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de envío</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Políticas de devolución</p>
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
            <p class="font-bold font-inter text-text24 md:text-text28">Suscribete a nuestro blog</p>
            <p class="font-normal font-inter text-text12 md:text-text14">Mantente actualizado sobre las últimas noticias y
                ofertas.</p>
            <form action="" id="formInscripcion">
                @csrf
                <div class="relative w-full rounded-lg flex justify-center items-center">
                    <input type="email" placeholder="hola@hotmail.com" name="email" id="email"
                        class="placeholder:text-[#565656] font-medium font-inter text-text12 md:text-text14 w-full border-none outline-none focus:outline-none pl-5 pr-4 py-4 text-[#565656]">
                    <input type="text" name="tipo" value="Inscripción" hidden />
                    <div class="absolute inset-y-0 right-0  flex items-center pl-3">
                        <button type="submit"
                            class="text-[#0051FF] font-bold font-inter text-text12 md:text-text14 pr-5 pl-4 py-4">Suscriberme
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</footer>
