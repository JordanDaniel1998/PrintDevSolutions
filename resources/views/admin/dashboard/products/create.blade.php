@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

@section('contenido')
    <section class="flex flex-col gap-10 shadow-md border-2 px-3 md:!px-10 py-10">
        <form action="{{ route('products.store') }}" method="POST" class="flex flex-col w-full gap-10"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col lg:flex-row lg:divide-x-8 w-full">
                <div class="lg:pr-5 flex-1 flex flex-col gap-2">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-3">
                        <div class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="title" :value="__('Título')" />
                            <x-input-text-dashboard id="title" type="text" required
                                autocomplete="Nombre del producto" placeholder="Nombre del producto" name="title"
                                :value="old('title')" />
                            @error('title')
                                <span class="text-red-500 font-medium">
                                    {{ str_replace('title', 'título', $message) }}
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="subTitle" :value="__('SubTítulo')" />
                            <x-input-text-dashboard id="subTitle" type="text" required
                                autocomplete="Subtítulo del producto" placeholder="Subtítulo del producto" name="subTitle"
                                :value="old('subTitle')" />
                            @error('subTitle')
                                <span class="text-red-500 font-medium">
                                    El campo subtítulo es requerido.
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="description" :value="__('Descripción Principal')" />
                            <x-text-area-dashboard id="description" type="text" required
                                autocomplete="Descripción del producto" placeholder="Descripción del producto"
                                name="description" :value="old('description')" rows="5" />
                            @error('description')
                                <span class="text-red-500 font-medium">
                                    {{ str_replace('description', 'descripción', $message) }}
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-col justify-start items-center">
                            <div class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="imagen" :value="__('Imagen principal (Primera imagen)')" />
                                <x-input-text-dashboard id="imagen" type="file" name="imagen" accept="image/*"
                                    class="w-full image-preview" />
                                @error('imagen')
                                    <span class="text-red-500 font-medium">
                                        {{ str_replace('imagen', 'imagen', $message) }}
                                    </span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <img id="imagePreview" src="#" alt="producto" class="hidden w-96 pt-3" />
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">

                            <div class="flex flex-col gap-2">
                                <x-input-label-dashboard for="dropzone" :value="__('Galería de imagenes ( máximo 6 imagenes)')" />
                                <div id="dropzone" class="dropzone dz-clickable"></div>

                                <!-- crear colores -->
                                <div x-data="{ open: false }" id="modalColors" x-cloak>
                                    <!-- Open modal button -->
                                    <button type="button" x-on:click="open = true"
                                        class="px-4 py-2 bg-slate-700 text-white rounded-md">
                                        Agregar Colores
                                    </button>
                                    <!-- Modal Overlay -->
                                    <div x-show="open"
                                        class="fixed inset-0 px-2 z-[20000] overflow-hidden flex items-center justify-center">
                                        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition-opacity ease-in duration-300"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                            id="awayModal"></div>
                                        <!-- Modal Content -->
                                        <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                                            x-transition:enter-start="transform scale-75"
                                            x-transition:enter-end="transform scale-100"
                                            x-transition:leave="transition-transform ease-in duration-300"
                                            x-transition:leave-start="transform scale-100"
                                            x-transition:leave-end="transform scale-75"
                                            class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                                            <!-- Modal Header -->
                                            <div class="bg-indigo-500 text-white px-4 py-2 flex justify-between">
                                                <h2 class="text-lg font-semibold">Agregar Colores</h2>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="flex flex-col justify-start items-start gap-2 w-full p-3">
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color1">
                                                        Primer color:
                                                    </label>
                                                    <input type="text" id="color1" name="colors[color_0]"
                                                        class="color-picker">
                                                </div>
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color2">
                                                        Segundo color:
                                                    </label>
                                                    <input type="text" id="color2" name="colors[color_1]"
                                                        class="color-picker">
                                                </div>
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color3">
                                                        Tercer color:
                                                    </label>
                                                    <input type="text" id="color3" name="colors[color_2]"
                                                        class="color-picker">
                                                </div>
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color4">
                                                        Cuarto color:
                                                    </label>
                                                    <input type="text" id="color4" name="colors[color_3]"
                                                        class="color-picker">
                                                </div>
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color5">
                                                        Quinto color:
                                                    </label>
                                                    <input type="text" id="color5" name="colors[color_4]"
                                                        class="color-picker">
                                                </div>
                                                <div class="flex flex-row justify-between items-center gap-5 w-full">
                                                    <label for="color6">
                                                        Sexto color:
                                                    </label>
                                                    <input type="text" id="color6" name="colors[color_5]"
                                                        class="color-picker w-40">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropzone-wrapper">
                                <input type="hidden" name="images" value="{{ old('images') }}">
                                @error('images')
                                    <span class="text-red-500 font-medium">
                                        {{ str_replace('images', 'galería', $message) }}
                                    </span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="description_short" :value="__('Descripción Secundaria')" />
                                <x-text-area-dashboard id="description_short" type="text" required
                                    autocomplete="Descripción secundaria del producto"
                                    placeholder="Descripción secundaria del producto" name="description_short"
                                    :value="old('description_short')" rows="2" />
                                @error('description_short')
                                    <span class="text-red-500 font-medium">
                                        El campo descripción secundaria es requerido.
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>

                <div class="lg:pl-5 flex-1 flex flex-col gap-2">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                        <div class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="price" :value="__('Precio')" />
                            <x-input-text-dashboard id="price" type="number" required
                                autocomplete="Precio del producto" placeholder="Precio del producto" name="price"
                                :value="old('price')" />
                            @error('price')
                                <span class="text-red-500 font-medium">
                                    {{ str_replace('price', 'precio', $message) }}
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="stock" :value="__('Cantidad')" />
                            <x-input-text-dashboard id="stock" type="number" required
                                autocomplete="Stock del producto" placeholder="Stock del producto" name="stock"
                                :value="old('stock')" />
                            @error('stock')
                                <span class="text-red-500 font-medium">
                                    {{ str_replace('stock', 'stock', $message) }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        @livewire('products.select-createproducts')
                    </div>


                    <div>
                        @livewire('products.specification-createproducts')
                    </div>

                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}"
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

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


                    // Por cada imagen que se agrega disparamos un evento para agregar los color-picker
                    Livewire.dispatch('addInputColor', [hiddenInput.value]);

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

                    // ------------------------------------
                    const deleteImage = async () => {
                        try {
                            const response = await axios.post(
                                '/admin/imagenes/delete', {
                                    name: linkElement
                                });

                        } catch (error) {
                            console.error(error);
                        }
                    };

                    deleteImage();

                });

            },
        });
    </script>

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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalColors = document.getElementById('modalColors');

            var modalComponentColors = Alpine.$data(modalColors);
            const awayModal = document.getElementById('awayModal');

            // Cerrar modal cuando se clickea afuera
            awayModal.addEventListener('click', e => {
                modalComponentColors.open = false;
            });

            $(".color-picker").each(function() {

                $(this).spectrum({
                    type: "component",
                    showInput: true,
                    preferredFormat: "hex",
                    showPalette: true,
                    palette: [
                        ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                        ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f3f"],
                        ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3",
                            "#d9d2e9",
                            "#ead1dc"
                        ],
                        ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8",
                            "#b4a7d6",
                            "#d5a6bd"
                        ],
                        ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc",
                            "#8e7cc3",
                            "#c27ba0"
                        ],
                        ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6",
                            "#674ea7",
                            "#a64d79"
                        ],
                        ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394",
                            "#351c75",
                            "#741b47"
                        ],
                        ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763",
                            "#20124d",
                            "#4c1130"
                        ]
                    ]
                });

            });


        });
    </script>
@endpush
