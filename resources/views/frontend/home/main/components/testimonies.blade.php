@if ($testimonies->count() > 0)
    <section class="bg-[#FBFBFB] py-20">
        <div class="w-11/12 mx-auto flex flex-col gap-3 items-center" data-aos="fade-up" data-aos-offset="150">
            <h2 class="font-inter font-bold text-text32 md:text-text44 text-center">Clientes satisfechos</h2>
            <p class="font-inter font-normal text-text14 text-[#565656] text-center w-full md:w-2/3">Lorem ipsum
                dolor sit
                amet, consectetur adipiscing elit. Vivamus eu fermentum justo, ac fermentum nulla. Sed sed
                scelerisque
                urna, vitae ultrices libero. Pellentesque vehicula et urna in venenatis.
            </p>
        </div>

        <div class="mt-16 w-11/12 mx-auto" data-aos="fade-up" data-aos-offset="150">
            <div class="swiper swiper_slider_testimonies rounded-2xl">
                <div class="swiper-wrapper">
                    @foreach ($testimonies as $testimony)
                        <div class="swiper-slide">
                            <div class="flex flex-col gap-5 bg-[#FFFFFF] border-[1.5px] border-gray-100 shadow-md p-8">
                                <div class="flex justify-start items-center gap-5">
                                    <div class="flex justify-center items-start">
                                        @if ($testimony->user->imagen_perfil)
                                            <img src="{{ asset('storage/users/' . $testimony->user->imagen_perfil) }}"
                                                alt="usuario" class="rounded-full size-14" loading="lazy">
                                        @else
                                            <img src="{{ asset('images/img/avatar.png') }}" alt="usuario"
                                                class="rounded-full size-14">
                                        @endif
                                    </div>
                                    <div class="flex flex-col gap-2 justify-start">
                                        <h3 class="font-inter font-medium text-text24 md:text-text32 text-[#111111]">
                                            {{ $testimony->user->username }}
                                        </h3>
                                        <div class="flex justify-start items-center gap-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div>
                                                    <svg width="20" height="20" viewBox="0 0 16 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z"
                                                            fill="{{ $i <= $testimony->stars ? '#FFAD33' : '#000000' }}"
                                                            opacity="{{ $i <= $testimony->stars ? 1 : 0.25 }}" />
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[#565656] font-inter font-normal text-text14 md:text-text18">
                                        {{ $testimony->comment }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @auth
            <div class="flex justify-center items-center mt-10 w-11/12 mx-auto" data-aos="fade-up" data-aos-offset="150">
                <a href="{{ route('posts.index', auth()->user()) }}"
                    class="bg-[#111111] py-3 px-5 text-white rounded-md animate-balance">
                    ¡Comparte tu opinión con nosotros!
                </a>
            </div>
        @endauth
    </section>
@endif
