@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

    <section class="flex flex-col gap-10">

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="flex flex-col w-full gap-10"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col lg:flex-row lg:divide-x-8 w-full">
                <div class="lg:pr-5 flex-1">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="title" :value="__('Título')" />
                            <x-input-text-dashboard id="title" type="text" required
                                autocomplete="Nombre del producto" placeholder="Nombre del producto" name="title"
                                value="{{ $product->title }}" />
                            <x-input-error-dashboard :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="subTitle" :value="__('SubTítulo')" />
                            <x-input-text-dashboard id="subTitle" type="text" required
                                autocomplete="Subtítulo del producto" placeholder="Subtítulo del producto" name="subTitle"
                                value="{{ $product->subTitle }}" />
                            <x-input-error-dashboard :messages="$errors->get('subTitle')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="description" :value="__('Descripción Principal')" />
                            <x-text-area-dashboard id="description" type="text" required
                                autocomplete="Descripción del producto" placeholder="Descripción del producto"
                                name="description" value="{{ $product->description }}" rows="5" />
                            <x-input-error-dashboard :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex flex-col justify-start items-center">
                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="imagen" :value="__('Imagen principal')" />
                                <x-input-text-dashboard id="imagen" type="file" name="imagen" accept="image/*"
                                    onchange="imagePrincipal(event)" class="w-full" />
                                <x-input-error-dashboard :messages="$errors->get('imagen')" class="mt-2" />
                            </div>

                            <div class="flex flex-col md:flex-row justify-between items-start w-full pt-2">

                                <div>
                                    <div class="flex flex-col justify-start-start">
                                        <p class="text-center">Imagen actual</p>
                                        <div class="w-full">
                                            <img src="{{ asset('storage/uploads/' . $product->imagen) }}" alt="producto"
                                                class="w-32 pt-3" />
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden imagePreviewParent">
                                    <div class="flex flex-col justify-start-start">
                                        <p class="text-center">Imagen nueva</p>
                                        <div class="w-full">
                                            <img id="imagePreview" src="#" alt="producto" class="hidden w-32 pt-3" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">

                            <div>
                                <x-input-label-dashboard for="dropzone" :value="__('Galería de imagenes ( máximo 6 imagenes)')" class="pb-2" />
                                <div id="dropzone" class="dropzone dz-clickable">

                                </div>
                            </div>

                            <div class="dropzone-wrapper">

                                <input type="hidden" name="images" value="{{ $files }}">
                                <x-input-error-dashboard :messages="$errors->get('images')" class="mt-2" />
                            </div>

                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="description_short" :value="__('Descripción Secundaria')" />
                                <x-text-area-dashboard id="description_short" type="text" required
                                    autocomplete="Descripción secundaria del producto"
                                    placeholder="Descripción secundaria del producto" name="description_short"
                                    value="{{ $product->description_short }}" rows="2" />
                                <x-input-error-dashboard :messages="$errors->get('description_short')" class="mt-2" />
                            </div>
                        </div>
                    </div>


                </div>

                <div class="lg:pl-5 flex-1">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="price" :value="__('Precio')" />
                            <x-input-text-dashboard id="price" type="number" required
                                autocomplete="Precio del producto" placeholder="Precio del producto" name="price"
                                value="{{ $product->price }}" />
                            <x-input-error-dashboard :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="stock" :value="__('Cantidad')" />
                            <x-input-text-dashboard id="stock" type="number" required
                                autocomplete="Stock del producto" placeholder="Stock del producto" name="stock"
                                value="{{ $product->stock }}" />
                            <x-input-error-dashboard :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}"
                    class="bg-black text-white font-outfit px-5 py-2.5 justify-center items-center gap-3 rounded-lg  no-underline hidden md:inline-flex">
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
                    class="w-full md:w-auto bg-black text-white font-outfit px-5 py-2.5 justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    Guardar Cambios
                </button>
            </div>
        </form>
    </section>
@endsection


@push('scripts')
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    {{--  @vite('resources/js/dropzone.js') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        const tokenCsrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let hiddenInput = document.querySelector('input[type="hidden"][name="images"]');
        let images = [];


        const dropzone = new Dropzone("#dropzone", {
            url: "{{ route('imagenes.store') }}",
            dictDefaultMessage: "Sube aquí tu imagen",
            acceptedFiles: ".png, .jpg, .jpeg, .gif",
            addRemoveLinks: true,
            dictRemoveFile: "Borrar archivo",
            paramName: "file[]",
            /* autoProcessQueue: false, */
            uploadMultiple: false, // Envia un solo archivo en cada peticion
            headers: {
                'X-CSRF-TOKEN': tokenCsrf
            },
            init: function() {

                // ------------------------------------------------


                if (document.querySelector('[name="images"]').value.trim()) {

                    // Actualiza e array anterior de imagenes
                    images = JSON.parse(document.querySelector('[name="images"]').value.trim());


                    images.forEach(img => {
                        const imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = img;
                        /*   imagenPublicada.accepted: true; */

                        // Añade la imagen al dropzone
                        this.options.addedfile.call(this, imagenPublicada);
                        // Obtiene la ruta de la imagen y poder visualizar en el dropzone
                        this.options.thumbnail.call(
                            this,
                            imagenPublicada,
                            `/storage/uploads/${imagenPublicada.name}`
                        );

                        /* this.options.complete.call(this imagenPublicada); */

                        // Añadimos el nombre a la etiqueta a
                        const imageThumbnail = imagenPublicada.previewElement.querySelector(
                            'a[data-dz-remove]');
                        if (imageThumbnail) {
                            imageThumbnail.setAttribute('data-name', imagenPublicada.name);
                        }

                        // Añadimos clases que el dropzone normalmente las maneja
                        imagenPublicada.previewElement.classList.add(
                            "dz-preview",
                            "dz-processing",
                            "dz-image-preview",
                            "dz-success",
                            "dz-complete"
                        );

                        // Subimos la cantidad de archivos al administrador de dropzone
                        this.files.push(imagenPublicada);
                    });

                    // Restamos la cantidad de archivos al tamaño original
                    /*  count = this.options.maxFiles - images.length; */

                }

                // --------------------------------------------------

                this.on("maxfilesexceeded", function(file) {

                    this.removeFile(file);


                });
                this.on("success", function(file, response) {

                    // Obtener cada imagen subida e insertar el titulo en su etiqueta a
                    const imageThumbnail = file.previewElement.querySelector(
                        'a[data-dz-remove]');
                    if (imageThumbnail) {
                        imageThumbnail.setAttribute('data-name', response.nameOfImage);
                    }

                    // Agregar imagenes al value del input
                    images.push(response.nameOfImage);
                    let imagesString = JSON.stringify(images);
                    hiddenInput.value = imagesString;

                });

                this.on("error", function(file, response) {
                    /* console.log(response); */
                });

                this.on("removedfile", function(file) {

                    // Selecciona la etiqueta " a " antes de que sea eliminada
                    const linkElement = file.previewElement.querySelector('a').getAttribute(
                    'data-name');

                    images = images.filter((thumbnail) => thumbnail !== linkElement);
                    let imagesString = JSON.stringify(images);
                    hiddenInput.value = imagesString;

                });

            },
        });
    </script>

    <script>
        function imagePrincipal(event) {
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
        }
    </script>
@endpush
