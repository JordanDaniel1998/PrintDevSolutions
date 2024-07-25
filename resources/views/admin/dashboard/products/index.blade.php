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
        <div>
            <a href="{{ route('products.create') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Agregar producto
            </a>
        </div>

        <div class="p-10 shadow-md border">
            <table id="products" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Título</th>
                        <th class="text-center align-middle">Imagen</th>
                        <th class="text-center align-middle">SKU</th>
                        <th class="text-center align-middle">Precio (S/.)</th>
                        <th class="text-center align-middle">Stock</th>
                        <th class="text-center align-middle">Visible</th>
                        <th class="text-center align-middle">Destacado</th>
                        <th class="text-center align-middle">Acciones</th>
                    </tr>
                </thead>

                <!-- livewire -->
                <livewire:products.show-products />

                <tfoot>
                    <tr>
                        <th class="text-center align-middle">Título</th>
                        <th class="text-center align-middle">Imagen</th>
                        <th class="text-center align-middle">SKU</th>
                        <th class="text-center align-middle">Precio (S/.)</th>
                        <th class="text-center align-middle">Stock</th>
                        <th class="text-center align-middle">Visible</th>
                        <th class="text-center align-middle">Destacado</th>
                        <th class="text-center align-middle">Acciones</th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        var products = $('#products').DataTable({
            responsive: true,
            ordering: false,
            dom: 'Blfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
            buttons: [{
                    extend: 'excelHtml5',
                    autoFilter: true,
                    filename: 'Data exportada - Productos',
                    sheetName: 'Data exportada - Productos',
                    className: 'btn btn-outline-success',
                    exportOptions: {
                        columns: [0, 2, 3] // Indica las columnas que se desea exportar
                    },
                    footer: false
                },
                {
                    extend: 'csvHtml5',
                    filename: 'Data exportada - Productos',
                    className: 'btn btn-outline-success',
                    exportOptions: {
                        columns: [0, 2, 3] // Indica las columnas que se desea exportar
                    },
                    footer: false
                },
                {
                    extend: 'pdfHtml5',
                    filename: 'Data exportada - Productos',
                    className: 'btn btn-outline-danger',
                    exportOptions: {
                        columns: [0, 2, 3] // Indica las columnas que se desea exportar
                    },
                    footer: false
                }
            ],
            topStart: {
                buttons: ['pageLength']
            }
        });
    </script>
@endpush
