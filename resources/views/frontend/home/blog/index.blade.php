@extends('frontend.layouts.app')


@section('contenido')
    <section>
        <div class="w-11/12 md:w-10/12 mx-auto pt-5 pb-16">
            <div class="flex flex-col gap-10" data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col gap-2">
                    <p class="text-[#0051FF] font-inter font-bold text-text22 md:text-text24">Blogs</p>
                    <h2
                        class="text-[#111111] font-inter font-bold text-text44 md:text-text52 leading-[1.10] md:leading-tight">
                        Descubre lo digital:
                        <span class="block">
                            Publicaciones sobre el mundo Digital
                        </span>
                    </h2>
                    <p class="text-[#565656] font-inter font-normal text-text18 md:text-text22">Nunc porta feugiat magna non
                        hendrerit. Nam tempor diam quis urna maximus, ac laoreet arcu convallis. Aenean dignissim nec sem
                        quis consequat.</p>
                </div>

                <div class="grid grid-cols-1 grid-rows-1 lg:grid-cols-2 lg:grid-rows-2 gap-10">

                    @foreach ($blogsLatest as $key => $blog)
                        @if ($key === 0)
                            <div class="row-span-1 col-span-1 lg:col-span-1 lg:row-span-2 flex flex-col gap-5"
                                data-aos="fade-up" data-aos-offset="150">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('blogs.show', $blog->id) }}">
                                        <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="{{ $blog->title }}"
                                            class="w-full">
                                    </a>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col gap-2">
                                        <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                            {{ $blog->categoryBlog->name }}
                                        </p>
                                        <div>
                                            <a href="{{ route('blogs.show', $blog->id) }}"
                                                class="text-[#082252] font-inter font-bold text-text16 md:text-text28">
                                                {{ $blog->title }}
                                            </a>
                                        </div>

                                        <p class="text-[#565656] font-inter font-normal text-text12 md:text-text20 ">
                                            {{ $blog->subTitle }}
                                        </p>
                                    </div>

                                    <div
                                        class="flex justify-start items-center text-text14 text-[#0051FF] font-inter font-medium gap-1 md:gap-2">
                                        <p class="hidden lg:block">
                                            {{ $blog->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                        </p>
                                        <p class="block lg:hidden">{{ $blog->created_at->format('m/d/Y') }}</p>
                                        <div class="size-1 bg-[#0051FF] rounded-full"></div>
                                        <p>
                                            Leído {{ $blog->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row-span-1 col-span-1 lg:col-span-1 lg:row-span-1 grid grid-cols-1 lg:grid-cols-2 gap-5"
                                data-aos="fade-up" data-aos-offset="150">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="inline-block w-full h-full">
                                        <img src="{{ asset('storage/uploads/' . $blog->imagen) }}"
                                            alt="{{ $blog->title }}" class="w-full h-full object-cover">
                                    </a>
                                </div>

                                <div class="flex flex-col gap-3 justify-center">
                                    <div class="flex flex-col gap-2">
                                        <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                            {{ $blog->categoryBlog->name }}
                                        </p>
                                        <div>
                                            <a href="{{ route('blogs.show', $blog->id) }}">
                                                <h2 class="text-[#082252] font-inter font-bold text-text16 md:text-text28">
                                                    {{ $blog->title }}</h2>
                                            </a>
                                        </div>
                                        <p
                                            class="text-[#565656] font-inter font-normal text-text12 md:text-text20 leading-tight">
                                            {{ $blog->subTitle }}
                                        </p>
                                    </div>

                                    <div
                                        class="flex justify-start items-center text-text14 text-[#0051FF] font-inter font-medium gap-1 md:gap-2">
                                        <p class="hidden lg:block">
                                            {{ $blog->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                        </p>
                                        <p class="block lg:hidden">{{ $blog->created_at->format('m/d/Y') }}</p>
                                        <div class="size-1 bg-[#0051FF] rounded-full"></div>
                                        <p>
                                            Leído {{ $blog->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>

        <div class="w-11/12 md:w-10/12 mx-auto pb-16 md:pb-24">
            <div class="flex flex-col gap-10" data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col gap-4 md:gap-2">
                    <h2
                        class="font-inter font-bold text-[#111111] text-text44 md:text-text52 leading-none md:leading-tight">
                        Últimas publicaciones
                    </h2>
                    <p class="text-[#565656] font-inter font-normal text-text18 md:text-text22">Nam tempor diam quis urna
                        maximus, ac laoreet arcu convallis. Aenean dignissim nec sem quis consequat.</p>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-10">

                    @foreach ($blogs as $blog)
                        <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                            <div>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="inline-block w-full h-full">
                                    <img src="{{ asset('storage/uploads/' . $blog->imagen) }}"
                                        alt="{{ $blog->title }}" class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                    {{ $blog->categoryBlog->name }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <h2 class="text-[#082252] font-inter font-bold text-text16 md:text-text28">
                                        {{ $blog->title }}</h2>
                                </a>
                                <p class="text-[#565656] font-inter font-normal text-text12 md:text-text20 ">
                                    {{ $blog->subTitle }}</p>
                            </div>

                            <div
                                class="flex justify-start items-center text-text10 md:text-text14 text-[#0051FF] font-inter font-medium gap-1 md:gap-2">
                                <p class="hidden lg:block"> {{ $blog->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                </p>
                                <p class="block lg:hidden">{{ $blog->created_at->format('m/d/Y') }}</p>
                                <div class="size-1 bg-[#0051FF] rounded-full"></div>
                                <p>
                                    Leído {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
