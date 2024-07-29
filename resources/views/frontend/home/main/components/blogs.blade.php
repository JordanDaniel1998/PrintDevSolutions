@if ($blogs->count() > 0)
    <section class="w-11/12 mx-auto py-16">
        <div class="flex flex-col gap-10">
            <div class="flex flex-col justify-center gap-3 md:flex-row md:justify-between md:items-center">
                <div class="flex flex-col gap-5 basis-8/12">
                    <h2
                        class="font-inter font-bold text-text44 md:text-text52 text-[#111111] leading-none md:leading-tight">
                        Últimas publicaciones</h2>
                    <p class="text-[#565656] text-text18 md:text-text22 font-inter font-normal">Nam tempor diam quis urna
                        maximus, ac laoreet arcu convallis. Aenean dignissim nec sem quis consequat.</p>
                </div>

                <div class="flex justify-end items-center basis-4/12">
                    <a href="{{ route('blogs.index') }}"
                        class="font-inter font-bold text-text16 md:text-text20 py-3 px-5 bg-[#0051FF] text-white md:w-auto text-center w-full">Ver
                        más Publicaciones</a>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-10">

                @foreach ($blogs as $key => $blog)
                    @if ($key < 3)
                        <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                            <div>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="{{ $blog->title }}"
                                        class="w-full" loading="lazy">
                                </a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                    {{ $blog->categoryBlog->name }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}"
                                    class="text-[#082252] font-inter font-bold text-text16 md:text-text28">
                                    {{ $blog->title }}
                                </a>

                                <p class="text-[#565656] font-inter font-normal text-text12 md:text-text20 ">
                                    {{ $blog->subTitle }}</p>
                            </div>

                            <div
                                class="flex justify-start items-center text-text10 md:text-text14 text-[#0051FF] font-inter font-medium gap-1 md:gap-2">
                                <p class="hidden lg:block">{{ $blog->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                </p>
                                <p class="block lg:hidden">{{ $blog->created_at->format('m/d/Y') }}</p>
                                <div class="size-1 bg-[#0051FF] rounded-full"></div>
                                <p>
                                    Leído {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="flex lg:hidden flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                            <div>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <img src="{{ asset('storage/uploads/' . $blog->imagen) }}"
                                        alt="{{ $blog->title }}" class="w-full" loading="lazy">
                                </a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                    {{ $blog->categoryBlog->name }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}"
                                    class="text-[#082252] font-inter font-bold text-text16 md:text-text28">
                                    {{ $blog->title }}
                                </a>
                                <p class="text-[#565656] font-inter font-normal text-text12 md:text-text20 ">
                                    {{ $blog->subTitle }}</p>
                            </div>

                            <div
                                class="flex justify-start items-center text-text10 md:text-text14 text-[#0051FF] font-inter font-medium gap-1 md:gap-2">
                                <p class="hidden lg:block">{{ $blog->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                </p>
                                <p class="block lg:hidden">{{ $blog->created_at->format('m/d/Y') }}</p>
                                <div class="size-1 bg-[#0051FF] rounded-full"></div>
                                <p>
                                    Leído {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif
