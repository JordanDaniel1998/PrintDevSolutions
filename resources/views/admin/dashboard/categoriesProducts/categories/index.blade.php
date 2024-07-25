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
            <!-- crear categoria -->
            <div x-data="{ open: false }" id="modalRegisterCategory" x-cloak>
                <!-- Open modal button -->
                <button x-on:click="open = true" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white rounded-md"> Agregar Categoría
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
                            <h2 class="text-lg font-semibold">Agregar Categoría</h2>
                        </div>
                        <!-- Modal Body -->
                        <form action="" id="formCategorieRegister">
                            <div
                                class="p-4 h-40 overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-500 scrollbar-track-gray-100">
                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="categorie" :value="__('Categoría')" />
                                    <x-input-text-dashboard id="categorie" type="text" required
                                        autocomplete="Nombre de la categoría" placeholder="Nombre de la categoría"
                                        name="categorie" />
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

            <!-- editar categoria -->
            <div x-data="{ open: false }" id="modalEditarCategory" x-cloak>
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
                            <h2 class="text-lg font-semibold">Editar Categoría</h2>
                        </div>
                        <!-- Modal Body -->
                        <form id="formCategorie" method="POST">
                            <div
                                class="p-4 h-36 overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-500 scrollbar-track-gray-100">
                                <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2 w-full">
                                    <x-input-label-dashboard for="category" :value="__('Categoría')" />
                                    <x-input-text-dashboard id="category" type="text" required
                                        autocomplete="Nombre de la categoría" placeholder="Nombre de la categoría"
                                        name="category" />
                                    <div class="error"></div>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="border-t px-4 py-2 flex justify-end items-center gap-2">
                                <button type="submit"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto"> Guardar
                                </button>

                                <button type="button" x-on:click="open = false"
                                    class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto"> Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- listar categoria -->
            <div class="p-10 shadow-md border">
                <table id="categories" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Categoría</th>
                            <th class="text-center align-middle">Acciones</th>

                        </tr>
                    </thead>

                    <!-- Por ajax se llena el tbody -->

                    <tfoot>
                        <tr>
                            <th class="text-center align-middle">Categoría</th>
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

            const category = document.getElementById('category');
            const categorie = document.getElementById('categorie');
            const modalElementEditar = document.getElementById('modalEditarCategory');
            const modalElementRegister = document.getElementById('modalRegisterCategory');
            var modalComponentEditar = Alpine.$data(modalElementEditar);
            var modalComponentRegister = Alpine.$data(modalElementRegister);
            const error = document.querySelector('.error');
            const cancel = document.getElementById('cancel');
            const awayModal = document.getElementById('awayModal');
            let id = null;

            // Datatable

            var categories = $('#categories').DataTable({
                responsive: true,
                ordering: false, // Desactivar el order por default
                dom: 'Blfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
                buttons: [{
                        extend: 'excelHtml5',
                        autoFilter: true,
                        filename: 'Data exportada - Categoría de Productos',
                        sheetName: 'Categoría de productos',
                        className: 'btn btn-outline-success',
                        exportOptions: {
                            columns: [0] // Indica las columnas que se desea exportar
                        },
                        footer: false
                    },
                    {
                        extend: 'csvHtml5',
                        filename: 'Data exportada - Categoría de Productos',
                        sheetName: 'Data exportada - Categoría de Productos',
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
                    url: '{{ route('productsOfCategories.getData') }}',
                    type: 'GET',
                    dataSrc: 'data' // Asegúrate de que el formato de datos coincida
                },
                columns: [{
                        data: 'name', // Nombre de las columnas que estan en la bd
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


            // Setear su valor del input

            categorie.addEventListener('input', (e) => {
                categorie.value = e.target.value;
            })

            // Registrar un categoría

            $('#formCategorieRegister').submit(function(e) {

                e.preventDefault();

                $.ajax({
                    url: 'categories',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'categorie': categorie.value
                    },
                    success: function(response) {
                        if (response.type === "success") {
                            modalComponentRegister.open = false;
                            categorie.value = "";
                            categories.ajax.reload();
                            setTimeout(() => {
                                Swal.fire(
                                    'Registrado!',
                                    'La categoría fue agregada.',
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
                modalComponentRegister.open = false;
                categorie.value = "";
            });

            // Cerrar modal cuando se clickea afuera
            awayModal.addEventListener('click', e => {
                modalComponentRegister.open = false;
                categorie.value = "";
            });


            // Setear su valor del input

            category.addEventListener('input', (e) => {
                category.value = e.target.value;
            })

            //  Editar una categoría

            $('#categories').on('click', '.btn-edit', function() {

                id = $(this).data('id');

                $.ajax({
                    url: 'categories/edit',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'id': id
                    },
                    success: function(response) {

                        if (response.type === "success") {
                            const p = document.querySelector('.message');
                            if (p) {
                                destroyMessage(error, p);
                            }

                            modalComponentEditar.open = true;
                            category.value = response.categorie.name;

                        } else {
                            alert('Error al actualizar la categoría');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });


            // Actualizar una categoría por ajax

            $('#formCategorie').submit(function(e) {

                e.preventDefault();

                if (category.value === "") {
                    showMessage();
                    return;
                }

                $.ajax({
                    url: 'categories/updates',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'id': id,
                        'categorie': category.value
                    },
                    success: function(response) {
                        if (response.type === "success") {
                            modalComponentEditar.open = false;
                            categories.ajax.reload();
                            setTimeout(() => {
                                Swal.fire(
                                    'Actualizado!',
                                    'La categoría fue actualizada.',
                                    'success'
                                )
                            }, 500);

                            const p = document.querySelector('.message');
                            if (p) {
                                destroyMessage(error, p);
                            }
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            //  Eliminar una categoría

            $('#categories').on('click', '.btn-delete', async function() {
                const categoryId = $(this).data('id');
                // Mostrar confirmación usando SweetAlert
                const result = await Swal.fire({
                    title: '¿Eliminar categoría?',
                    text: "Una categoría que se elimina no podrá ser recuperado!",
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
                        const response = await axios.delete('categories/' + categoryId, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });

                        if (response.data.type) {

                            Swal.fire({
                                title: "Eliminado!",
                                text: "La categoría ah sido eliminado.",
                                icon: "success",
                            });

                            categories.ajax.reload();
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


            // Mensaje de error

            function showMessage() {

                const p = document.createElement('p');
                p.classList.add('text-sm', 'text-red-600', 'space-y-1', 'font-bold', 'message');
                p.textContent = 'El campo categoría no debe ser vacío';
                destroyMessage(error, p);
                error.appendChild(p);
            }

            function destroyMessage(error, p) {
                while (error.firstChild) {
                    error.removeChild(error.firstChild);
                }
            }
        });
    </script>
@endpush
