@extends('admin.layouts.app')

@section('contenido')
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="uppercase border p-3 text-md font-bold
    {{ session('type') === 'success' ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }}">
            {{ session('message') }}
        </div>
    @endif
    <section class="shadow-md border-2 px-3 md:!px-10 py-10">

        <form action="{{ route('articles.update', $blog->id) }}" method="POST" class="flex flex-col gap-10" novalidate
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="title" :value="__('Título')" />
                    <x-input-text-dashboard id="title" type="text" required autocomplete="Título del producto"
                        placeholder="Título del producto" name="title" value="{{ $blog->title }}" />
                    @error('title')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('title', 'título', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="subTitle" :value="__('Subtítulo')" />
                    <x-input-text-dashboard id="subTitle" type="text" required autocomplete="Subtítulo del producto"
                        placeholder="Subtítulo del producto" name="subTitle" value="{{ $blog->subTitle }}" />
                    @error('subTitle')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('subTitle', 'subtítulo', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col justify-start items-start">
                    <div class="flex flex-col gap-2 w-full">
                        <x-input-label-dashboard for="imagen" :value="__('Imagen principal')" />
                        <x-input-text-dashboard id="imagen" type="file" name="imagen" accept="image/*"
                            class="w-full image-preview" />
                        @error('imagen')
                            <span class="text-red-500 font-medium">
                                {{ str_replace('imagen', 'imagen', $message) }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-row justify-start items-start gap-4 pt-2">

                        <div class="flex flex-col justify-start border shadow-sm p-2">
                            <p class="text-center">Imagen actual</p>
                            <div class="w-full">
                                <img src="{{ asset('storage/uploads/' . $blog->imagen) }}" alt="producto"
                                    class="w-32 pt-3" />
                            </div>
                        </div>

                        <div class="hidden imagePreviewParent border shadow-sm p-2">
                            <div class="flex flex-col justify-start">
                                <p class="text-center">Imagen nueva</p>
                                <div class="w-full">
                                    <img id="imagePreview" src="#" alt="producto" class="hidden w-32 pt-3" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <x-input-label-dashboard for="category" :value="__('Categoría')" />
                    <select name="category" id="category"
                        class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all">
                        <option value="">-- Seleccione --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $blog->category_blog_id === $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('category', 'categoría', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="description" :value="__('Descripción principal')" />
                    <x-text-area-dashboard id="description" type="text" required
                        autocomplete="Descripción principal del blog" placeholder="Descripción principal del blog"
                        name="description" value="{{ $blog->description }}" rows="5" />
                    @error('description')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('description', 'descripción', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="keywords" :value="__('Información relevante')" />
                    <x-text-area-dashboard id="keywords" type="text" required autocomplete="Datos importantes"
                        placeholder="Escribe alguna información relevante del blog" name="keywords"
                        value="{{ $blog->keywords }}" rows="2" />
                    @error('keywords')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('keywords', 'información relevante', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="description_short" :value="__('Descripción Secundaria')" />
                    <x-text-area-dashboard id="description_short" type="text" required
                        autocomplete="Descripción secundaria del blog" placeholder="Descripción secundaria del blog"
                        name="description_short" value="{{ $blog->description_short }}" rows="2" />
                    @error('description_short')
                        <span class="text-red-500 font-medium">
                            El campo descripción secundaria es requerido.
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('articles.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-600 md:duration-300 text-white font-outfit px-4 py-2.5 justify-center items-center gap-3 rounded-lg  no-underline hidden md:inline-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                        </svg>
                    </div>
                    <span>Atrás</span>
                </a>

                <button type="submit"
                    class="w-full md:w-auto bg-indigo-500 hover:bg-indigo-600 md:duration-300 text-white font-outfit px-4 py-2.5 justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    Guardar Producto
                </button>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const imagePreview = document.querySelector('.image-preview');
            imagePreview.addEventListener('change', (event) => {

                const input = event.target;
                const file = input.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.getElementById('imagePreview');
                        const imagePreviewParent = document.querySelector('.imagePreviewParent');

                        img.src = e.target.result;
                        imagePreviewParent.classList.remove('hidden');
                        img.classList.remove('hidden');
                        img.classList.add('block');

                    };

                    reader.readAsDataURL(file);
                } else {
                    const img = document.getElementById('imagePreview');
                    const imagePreviewParent = document.querySelector('.imagePreviewParent');
                    img.src = '#';
                    img.classList.remove('block');
                    img.classList.add('hidden');
                    imagePreviewParent.classList.add('hidden');
                }

            });

        });
    </script>
@endpush
