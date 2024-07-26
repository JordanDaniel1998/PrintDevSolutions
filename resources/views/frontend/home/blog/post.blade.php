@extends('frontend.layouts.app')

@section('contenido')
    <section class="w-11/12 md:w-10/12 mx-auto pt-5">

        <div class="flex flex-col gap-10" data-aos="fade-up" data-aos-offset="150">
            <div class="flex flex-col gap-2">
                <h1 class="font-inter font-bold text-text40 md:text-text48 leading-tight">Nullam facilisis aliquet nibh, eu
                    tincidunt lacus rhoncus blandit</h1>
                <p class="text-[#0051FF] font-inter font-bold text-text16 md:text-text20">{{ $blog->categoryBlog->name }} -
                    {{ $blog->created_at->format('m/d/Y') }}</p>
            </div>

            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="{{ $blog->title }}" class="w-full">
            </div>

            <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-offset="150">
                <p class="text-[#565656] text-text18 md:text-text22 font-inter font-normal">
                    {{ $blog->description_short }}
                </p>
            </div>

            <div class="flex flex-wrap gap-4 justify-center text-text18 md:text-text22 my-10" data-aos="fade-up"
                data-aos-offset="150">
                <p
                    class="bg-[#FFFFFF] font-medium italic flex-grow text-text18 xl:text-text22 text-justify border-l-4 border-[#0051FF] px-3 py-2 w-full md:w-5/12 lg:w-3/12">
                    {{ $blog->keywords }}
                </p>
            </div>

            <div>
                <p class="text-[#565656] text-text18 md:text-text22 font-inter font-normal">
                    {{ $blog->description }}
                </p>
            </div>
        </div>
    </section>

    <section class="w-11/12 md:w-10/12 mx-auto pt-10 pb-16">
        <div class="flex flex-col gap-10">
            <div class="flex flex-col justify-center gap-3 md:flex-row md:justify-between md:items-center">
                <div class="flex flex-col gap-5 basis-8/12">
                    <h2
                        class="font-inter font-bold text-text44 md:text-text52 text-[#111111] leading-none md:leading-tight">
                        Últimas publicaciones</h2>
                    <p class="text-[#565656] text-text18 md:text-text22 font-inter font-normal">Nam tempor diam quis urna
                        maximus,
                        ac laoreet arcu convallis. Aenean dignissim nec sem quis consequat.</p>
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
                                <a href="{{ route('blogs.show', $blog->id) }}" class="inline-block w-full h-full">
                                    <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="{{ $blog->title }}"
                                        class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                    {{ $blog->categoryBlog->name }}
                                </p>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <h2
                                        class="text-[#082252] font-inter font-bold text-text16 md:text-text28 leading-[19px] md:leading-[32px]">
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
                    @else
                        <div class="flex lg:hidden flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
                            <div>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="inline-block w-full h-full">
                                    <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="{{ $blog->title }}"
                                        class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="font-inter font-bold text-text12 md:text-text20 text-[#0051FF]">
                                    {{ $blog->categoryBlog->name }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    <h2
                                        class="text-[#082252] font-inter font-bold text-text16 md:text-text28 leading-[19px] md:leading-[32px]">
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
