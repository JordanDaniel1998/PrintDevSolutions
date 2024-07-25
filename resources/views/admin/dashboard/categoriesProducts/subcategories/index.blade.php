@extends('admin.layouts.app')

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush


@section('contenido')
    <section>
        <div class="flex flex-col gap-5 lg:pt-10">
            <!-- crear subcategoria -->
            <div x-data="{ open: false }" id="modalRegisterSubCategory" x-cloak>
                <!-- Open modal button -->
                <button x-on:click="open = true" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white rounded-md"> Agregar SubCategoría
                </button>
                <!-- Modal Overlay -->
                <div x-show="open" class="fixed inset-0 px-2 z-[20000] overflow-hidden flex items-center justify-center">
                    <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" id="awayModal"></div>
                    <!-- Modal Content -->
                    <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                        x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100"
                        x-transition:leave="transition-transform ease-in duration-300"
                        x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75"
                        class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                        <!-- Modal Header -->
                        <div class="bg-indigo-500 text-white px-4 py-2 flex justify-between">
                            <h2 class="text-lg font-semibold">Agregar SubCategoría</h2>
                        </div>

                        <!-- Modal Body -->
                        <form action="" id="formSubCategorieRegister">

                            <div
                                class="p-4 h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-500 scrollbar-track-gray-100 flex flex-col gap-3">

                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="category" :value="__('Categoría')" />

                                    <select name="category" id="category" required
                                        class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all">
                                        <option value="">-- Seleccionar --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="subcategory" :value="__('SubCategoría')" />
                                    <x-input-text-dashboard id="subcategory" type="text" required
                                        autocomplete="Nombre de la SubCategoría" placeholder="Nombre de la SubCategoría"
                                        name="subcategory" />
                                   {{--  <div class="subcategoryMessage"></div> --}}
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="border-t px-4 py-2 flex justify-end items-center gap-2">

                                <button type="submit"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto">
                                    Guardar
                                </button>

                                <button type="button" id="cancel"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto"> Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- editar subcategoria -->
            <div x-data="{ open: false }" id="modalEditarSubCategory" x-cloak>
                <!-- Modal Overlay -->
                <div x-show="open" class="fixed inset-0 px-2 z-[20000] overflow-hidden flex items-center justify-center">
                    <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <!-- Modal Content -->
                    <div x-show="open" x-on:click.away="open = false"
                        x-transition:enter="transition-transform ease-out duration-300"
                        x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100"
                        x-transition:leave="transition-transform ease-in duration-300"
                        x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75"
                        class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                        <!-- Modal Header -->
                        <div class="bg-indigo-500 text-white px-4 py-2 flex justify-between">
                            <h2 class="text-lg font-semibold">Editar Subcategoría</h2>
                        </div>
                        <!-- Modal Body -->
                        <form action="" id="formSubCategoriesUpdate" method="POST">
                            <div
                                class="p-4 h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-500 scrollbar-track-gray-100 flex flex-col gap-3">

                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="category1" :value="__('Categoría')" />

                                    <select name="category1" id="category1"
                                        class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all"
                                        required>
                                        <option value="">-- Seleccionar --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="selectCategory1Message"></div> --}}
                                </div>

                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="subcategory1" :value="__('SubCategoría')" />
                                    <x-input-text-dashboard id="subcategory1" type="text" required
                                        autocomplete="Nombre de la SubCategoría" placeholder="Nombre de la SubCategoría"
                                        name="subcategory1" />
                                    {{-- <div class="subcategory1Message"></div> --}}
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="border-t px-4 py-2 flex justify-end items-center gap-2">

                                <button type="submit"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto">
                                    Guardar
                                </button>

                                <button type="button" x-on:click="open = false"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto"> Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- listar subcategoria -->
            <div class="p-10 shadow-md border">
                <table id="subcategories" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">SubCategoría</th>
                            <th class="text-center align-middle">Acciones</th>

                        </tr>
                    </thead>

                    <!-- Por ajax se llena el tbody -->

                    <tfoot>
                        <tr>
                            <th class="text-center align-middle">SubCategoría</th>
                            <th class="text-center align-middle">Acciones</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modalElementSubEditar = document.getElementById('modalEditarSubCategory');
            const modalElementSubRegister = document.getElementById('modalRegisterSubCategory');
            var modalComponentSubEditar = Alpine.$data(modalElementSubEditar);
            var modalComponentSubRegister = Alpine.$data(modalElementSubRegister);
            const selectCategoryMessageError = document.querySelector('.selectCategoryMessage');
            const subcategoryMessageError = document.querySelector('.subcategoryMessage');
            const awayModal = document.getElementById('awayModal');
            const cancel = document.getElementById('cancel');
            const category = document.getElementById('category');
            const subcategory = document.getElementById('subcategory');
            const category1 = document.getElementById('category1');
            const subcategory1 = document.getElementById('subcategory1');

            let id = null;

            // Datatable

            var subcategories = $('#subcategories').DataTable({
                responsive: true,
                ordering: false, // Desactivar el order por default
                dom: 'Blfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
                buttons: [{
                        extend: 'excelHtml5',
                        autoFilter: true,
                        filename: 'Data exportada - SubCategoría de Productos',
                        sheetName: 'SubCategoría de productos',
                        className: 'btn btn-outline-success',
                        exportOptions: {
                            columns: [0] // Indica las columnas que se desea exportar
                        },
                        footer: false
                    },
                    {
                        extend: 'csvHtml5',
                        filename: 'Data exportada - SubCategoría de Productos',
                        sheetName: 'Data exportada - SubCategoría de Productos',
                        className: 'btn btn-outline-success',
                        exportOptions: {
                            columns: [0] // Indica las columnas que se desea exportar
                        },
                        footer: false
                    }
                ],
                topStart: {
                    buttons: ['pageLength']
                },
                ajax: {
                    url: '{{ route('productsOfSubCategories.getData') }}',
                    type: 'GET',
                    dataSrc: 'data',

                },
                columns: [{
                        data: 'name',
                        className: 'text-center align-middle',
                    },
                    {
                        data: null, // No se extrae contenido de los datos para esta columna
                        orderable: false, // La columna no se puede ordenar
                        searchable: false, // La columna no se tiene en cuenta en la búsqueda
                        className: 'text-center align-middle',
                        render: function(data, type, column) {
                            return `
                        <div class="flex justify-center items-center gap-3">
                            <button type="button" data-id='${data.id}'
                                class="bg-yellow-500 p-2 rounded-md text-white btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>

                            <button type="button" data-id='${data.id}' class="bg-red-600 p-2 rounded-md text-white btn-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>

                        </div>
                    `;
                        }
                    }
                ]
            });

            // Evento de cambio para el select
            category.addEventListener('change', (e) => {
                category.value = e.target.value;

                const p = document.querySelector('.type-register');
                if (p) {
                    destroyMessage(selectCategoryMessageError, p);
                }
            });

            function destroyMessage(error, p) {
                while (error.firstChild) {
                    error.removeChild(error.firstChild);
                }
            }

            // Setear al input
            subcategory.addEventListener('input', (e) => {
                subcategory.value = e.target.value;
            });

            // Parrafo de error
            function message(selector, type) {
                const p = document.createElement('p');
                p.classList.add('text-sm', 'text-red-600', 'space-y-1', 'font-bold', type);
                p.textContent = 'El campo subcategoría no debe ser vacío';
                selector.appendChild(p);
            }

            // Registrar una subcategoria

            $('#formSubCategorieRegister').submit(function(e) {

                e.preventDefault();

                if (category.value === "") {
                    message(selectCategoryMessageError, 'type-register')
                    return;
                }

                $.ajax({
                    url: '{{ route('productsOfSubCategories.store') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'id': category.value,
                        'subcategory': subcategory.value
                    },
                    success: function(response) {

                        if (response.type === "success") {
                            modalComponentSubRegister.open = false;
                            subcategory.value = "";
                            category.value = "";
                            subcategories.ajax.reload();
                            setTimeout(() => {
                                Swal.fire(
                                    'Registrado!',
                                    'La subcategoría fue agregada.',
                                    'success'
                                )
                            }, 500);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            // Cerrar modal
            cancel.addEventListener('click', e => {
                modalComponentSubRegister.open = false;
                subcategory.value = "";
                category.value = "";
            });

            // Cerrar modal cuando se clickea afuera
            awayModal.addEventListener('click', e => {
                modalComponentSubRegister.open = false;
                subcategory.value = "";
                category.value = "";
            });

            //  Editar una subcategoría

            $('#subcategories').on('click', '.btn-edit', function() {

                id = $(this).data('id');

                $.ajax({
                    url: `subcategories/${id}/edit`,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        if (response.type === "success") {
                            modalComponentSubEditar.open = true;
                            subcategory1.value = response.subcategory.name;
                            category1.value = response.subcategory.categorie_id;

                        } else {
                            alert('Error al actualizar la categoría');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            //  Actualizar una subcategoría
            $('#formSubCategoriesUpdate').submit(function(e) {

                e.preventDefault();

                $.ajax({
                    url: 'subcategories/updates',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'subcategorie_id': id,
                        'categorie_id': category1.value,
                        'subcategorie': subcategory1.value
                    },
                    success: function(response) {

                        if (response.type === "success") {
                            modalComponentSubEditar.open = false;
                            subcategories.ajax.reload();
                            setTimeout(() => {
                                Swal.fire(
                                    'Actualizado!',
                                    'La subcategoría fue actualizada.',
                                    'success'
                                )
                            }, 500);

                            /* const p = document.querySelector('.message');
                            if (p) {
                                destroyMessage(error, p);
                            } */
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });


            //  Eliminar una subcategoría

            $('#subcategories').on('click', '.btn-delete', async function() {
                const subcategoryId = $(this).data('id');
                // Mostrar confirmación usando SweetAlert
                const result = await Swal.fire({
                    title: '¿Eliminar subcategoría?',
                    text: "Una subcategoría que se elimina no podrá ser recuperado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                });
                // Verificar si el usuario confirmó la eliminación
                if (result.isConfirmed) {
                    try {
                        // Enviar solicitud DELETE usando Axios
                        const response = await axios.delete('subcategories/' + subcategoryId, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });

                        if (response.data.type) {

                            Swal.fire({
                                title: "Eliminado!",
                                text: "La subcategoría ah sido eliminado.",
                                icon: "success",
                            });

                            subcategories.ajax.reload();
                        }

                    } catch (error) {
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while deleting the product.",
                            icon: "error",
                        });
                    }
                }
            });
        });
    </script>
@endpush
