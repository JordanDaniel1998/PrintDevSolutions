@extends('admin.layouts.app')

@section('contenido')
    <section>
        <form action="{{ route('partners.store') }}" method="POST" class="flex flex-col w-full gap-10"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col gap-3">

                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="title" :value="__('Nombre')" />
                    <x-input-text-dashboard id="title" type="text" required autocomplete="Nombre de la compañia"
                        placeholder="Nombre de la compañia" name="title" :value="old('title')" />
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
                        name="description" :value="old('description')" rows="2" />
                    @error('description')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('description', 'descripción', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col justify-start items-center">
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

                    <div class="w-full">
                        <img id="imagePreview" src="#" alt="compañia" class="hidden w-96 pt-3" />
                    </div>
                </div>

            </div>

            <div class="flex justify-start items-center">
                <button type="submit"
                    class="w-full md:w-auto bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-4 py-2.5 justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                    Guardar Partners
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
                        img.src = e.target.result;
                        img.classList.remove('hidden');
                        img.classList.add('block');
                    };

                    reader.readAsDataURL(file);
                } else {
                    const img = document.getElementById('imagePreview');
                    img.src = '#';
                    img.classList.remove('block');
                    img.classList.add('hidden');
                }
            })
        });
    </script>
@endpush
