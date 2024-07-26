@extends('admin.layouts.app')

@push('styles')
    <style>
        /* toogle de visible y destacado */
        .toggle-checkbox-visible:checked+div .dot {
            transform: translateX(100%);
        }

        .toggle-checkbox-visible:checked+div {
            background-color: #4ade80;
        }

        .toggle-checkbox-highlighted:checked+div .dot {
            transform: translateX(100%);
        }

        .toggle-checkbox-highlighted:checked+div {
            background-color: #4ade80;
        }

        /* fin toogle de visible y destacado */
    </style>
@endpush

@section('contenido')
    <section class="flex flex-col gap-10 lg:pt-10">

        <div class=" flex justify-start items-center gap-4">

            <a href="{{ route('articles.create') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Agregar blog
            </a>

        </div>

        <div class="p-10 shadow-md border">
            <table id="blogs" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Título</th>
                        <th class="text-left align-middle">Imagen</th>
                        <th class="!text-left align-middle">Visible</th>
                        <th class="!text-left align-middle">Acciones</th>
                    </tr>
                </thead>

                <!--  El tbody se llena por ajax -->

                <tfoot>
                    <tr>
                        <th class="text-left align-middle">Título</th>
                        <th class="text-left align-middle">Imagen</th>
                        <th class="!text-left align-middle">Visible</th>
                        <th class="!text-left align-middle">Acciones</th>
                    </tr>
                </tfoot>

            </table>
        </div>

    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {


            var blogs = $('#blogs').DataTable({
                responsive: true,
                ordering: false,
                dom: 'Blfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
                buttons: [{
                        extend: 'excelHtml5',
                        autoFilter: true,
                        filename: 'Data exportada - Blogs',
                        sheetName: 'Data exportada - Blogs',
                        className: 'btn btn-outline-success',
                        exportOptions: {
                            columns: [0] // Indica las columnas que se desea exportar
                        },
                        footer: false
                    },
                    {
                        extend: 'csvHtml5',
                        filename: 'Data exportada - Blogs',
                        className: 'btn btn-outline-success',
                        exportOptions: {
                            columns: [0] // Indica las columnas que se desea exportar
                        },
                        footer: false
                    },
                    {
                        extend: 'pdfHtml5',
                        filename: 'Data exportada - Blogs',
                        className: 'btn btn-outline-danger',
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
                    url: '{{ route('articles.getData') }}',
                    type: 'GET',
                    dataSrc: 'data' // Asegúrate de que el formato de datos coincida
                },
                columns: [{
                        data: 'title',
                        className: '!text-left align-middle',
                    },
                    {
                        data: 'imagen',
                        className: '!text-left align-middle',
                        render: function(data, type, row) {
                            return `
                                <img src="{{ asset('storage/uploads/${data}') }}" alt="Imagen" class="w-12 md:w-36" />
                            `;
                        }
                    },
                    {
                        data: 'visible',
                        className: '!text-left align-middle',
                        render: function(data, type, row) {
                            return `
                        <label class="flex justify-start items-center cursor-pointer">
                            <input type="checkbox" data-id="${row.id}" ${data ? 'checked' : ''}
                            class="sr-only toggle-checkbox-visible">
                            <div class="w-16 h-8 bg-gray-300 rounded-full relative">
                                <div class="dot absolute left-2 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                            </div>
                        </label>`;
                        }
                    },
                    {
                        data: null, // No se extrae contenido de los datos para esta columna
                        orderable: false, // La columna no se puede ordenar
                        searchable: false, // La columna no se tiene en cuenta en la búsqueda
                        className: 'text-center align-middle',
                        render: function(data, type, row) {
                            return `
                    <div class="flex justify-start items-center gap-3">
                        <a href="{{ route('articles.edit', '') }}/${row.id}"
                            class="bg-yellow-500 p-2 rounded-md text-white btn-edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>

                        <button type="button" data-id='${row.id}' class="bg-red-600 p-2 rounded-md text-white btn-delete">
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


            // Actualiza visible

            $('#blogs').on('change', '.toggle-checkbox-visible', function() {
                var visible = $(this).prop('checked') ? 1 : 0;
                var id = $(this).data('id');
                console.log(id)
                $.ajax({
                    type: "GET",
                    url: '{{ route('articles.visible') }}',
                    datatype: "json",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'visible': visible,
                        'id': id
                    },
                    success: function(data) {
                        let message = data.success ? 'esta visible.' : 'ya no esta visible.';
                        Swal.fire(
                            'Modificado!',
                            `El blog ${message}`,
                            'success'
                        )
                    },
                    error: function(data) {
                        console.error('Error:', data);
                    }
                });
            });


            //  Eliminar una categoría

            $('#blogs').on('click', '.btn-delete', async function() {
                const categoryId = $(this).data('id');
                // Mostrar confirmación usando SweetAlert
                const result = await Swal.fire({
                    title: '¿Eliminar blog?',
                    text: "Un blog que se elimina no podrá ser recuperado!",
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
                        const response = await axios.delete('articles/' + categoryId, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });

                        if (response.data.type) {

                            Swal.fire({
                                title: "Eliminado!",
                                text: "El blog ah sido eliminado.",
                                icon: "success",
                            });

                            blogs.ajax.reload();
                        }

                    } catch (error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Hubo un error al eliminar el blog.",
                            icon: "error",
                        });
                    }
                }
            });

        });
    </script>
@endpush
