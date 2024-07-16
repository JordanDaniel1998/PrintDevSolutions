@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <section class="flex flex-col gap-10">
        <form action="{{ route('products.store') }}" method="POST" class="flex flex-col w-full gap-10"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col lg:flex-row lg:divide-x-8 w-full">
                <div class="lg:pr-5 flex-1">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="title" :value="__('Título')" />
                            <x-input-text-dashboard id="title" type="text" required
                                autocomplete="Nombre del producto" placeholder="Nombre del producto" name="title"
                                :value="old('title')" />
                            <x-input-error-dashboard :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="subTitle" :value="__('SubTítulo')" />
                            <x-input-text-dashboard id="subTitle" type="text" required
                                autocomplete="Subtítulo del producto" placeholder="Subtítulo del producto" name="subTitle"
                                :value="old('sutTitle')" />
                            <x-input-error-dashboard :messages="$errors->get('subTitle')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col xl:flex-row xl:justify-between xl:items-start gap-3">
                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="description" :value="__('Descripción Principal')" />
                                <x-text-area-dashboard id="description" type="text" required
                                    autocomplete="Descripción del producto" placeholder="Descripción del producto"
                                    name="description" :value="old('description')" rows="5" />
                                <x-input-error-dashboard :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="flex flex-col justify-start items-center">
                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                                    <x-input-label-dashboard for="imagen" :value="__('Imagen principal')" />
                                    <x-input-text-dashboard id="imagen" type="file" name="imagen" accept="image/*"
                                        onchange="previewImage(event)" />
                                </div>

                                <div>
                                    <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; height: auto;" />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            {{--  --}}
                            <div>
                                <div id="dropzone" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>

                            <div class="dropzone-wrapper">
                                <input type="hidden" name="images" value="">
                            </div>

                            <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                <x-input-label-dashboard for="description_short" :value="__('Descripción Secundaria')" />
                                <x-text-area-dashboard id="description_short" type="text" required
                                    autocomplete="Descripción secundaria del producto"
                                    placeholder="Descripción secundaria del producto" name="description_short"
                                    :value="old('description_short')" rows="2" />
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
                                :value="old('price')" />
                            <x-input-error-dashboard :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                            <x-input-label-dashboard for="stock" :value="__('Cantidad')" />
                            <x-input-text-dashboard id="stock" type="number" required autocomplete="Stock del producto"
                                placeholder="Stock del producto" name="stock" :value="old('stock')" />
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
                    Guardar Producto
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
        const images = [];

        const dropzone = new Dropzone("#dropzone", {
            url: "{{ route('imagenes.store') }}",
            dictDefaultMessage: "Sube aquí tu imagen",
            acceptedFiles: ".png, .jpg, .jpeg, .gif",
            addRemoveLinks: true,
            dictRemoveFile: "Borrar archivo",
            maxFiles: 5,
            paramName: "file[]",
            /* autoProcessQueue: false, */
            uploadMultiple: false,
            headers: {
                'X-CSRF-TOKEN': tokenCsrf
            },
            init: function() {

                this.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                });
                this.on("success", function(file, response) {
                    images.push(response.nameOfImage);
                    let imagesString = JSON.stringify(images);
                    hiddenInput.value = imagesString;
                });
                this.on("error", function(file, response) {
                    console.log(response);
                });
                this.on("removedfile", function(file) {
                    const imageName = file.upload.filename;

                    /* const deleteImage = async () => {
                        try {
                            const response = await axios.post('/admin/imagenes/delete', {
                                name: "peero"
                            });
                            console.log(response);
                        } catch (error) {
                            console.error(error);
                        }
                    };

                    deleteImage(); */
                });
            },
        });
    </script>

    <script>
        function previewImage(event) {
            const input = event.target;
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.getElementById('imagePreview');
                    img.src = e.target.result;
                    img.style.display = 'block'; // Muestra la vista previa
                };

                reader.readAsDataURL(file);
            } else {
                const img = document.getElementById('imagePreview');
                img.src = '#';
                img.style.display = 'none'; // Oculta la vista previa si no hay archivo
            }
        }
    </script>

    {{-- <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            dropzone.processQueue();
        });
    </script> --}}
@endpush
