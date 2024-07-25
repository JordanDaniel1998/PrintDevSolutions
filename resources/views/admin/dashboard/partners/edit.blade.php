@extends('admin.layouts.app')

@section('contenido')
    <section>
        <form action="{{ route('partners.update', $partner->id) }}" method="POST" class="flex flex-col w-full gap-10"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col gap-3">

                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="title" :value="__('Nombre')" />
                    <x-input-text-dashboard id="title" type="text" required autocomplete="Nombre de la compañia"
                        placeholder="Nombre de la compañia" name="title" value="{{ $partner->title }}" />
                    @error('title')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('title', 'título', $message) }}
                        </span>
                    @enderror
                </div>

                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="description" :value="__('Descripción breve (máximo 255 caracteres)')" />
                    <x-text-area-dashboard id="description" type="text" required
                        autocomplete="Descripción de la compañia" placeholder="Descripción de la compañia"
                        name="description" value="{{ $partner->description }}" rows="2" />
                    @error('description')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('description', 'descripción', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col justify-start items-start">
                    <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
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
                                <img src="{{ asset('storage/partners/' . $partner->imagen) }}" alt="producto"
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

            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}"
                    class="bg-black text-white font-outfit px-4 py-2.5 justify-center items-center gap-3 rounded-lg  no-underline hidden md:inline-flex">
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
                    class="w-full md:w-auto bg-black text-white font-outfit px-4 py-2.5 justify-center items-center gap-2 rounded-lg inline-flex no-underline">
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
