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
        <div class="flex flex-col lg:flex-row justify-start items-start lg:items-center gap-3">
            <a href="{{ route('productsOfCategories.index') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Categorías
            </a>

            <a href="{{ route('productsOfSubCategories.index') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Subcategorías
            </a>


            <a href="{{ route('productsBrand.index') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Marcas
            </a>
        </div>

        <div class="p-10 shadow-md border">
            <table id="catSubBrands" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Categoría</th>
                        <th class="text-center align-middle">SubCategoría</th>
                        <th class="text-center align-middle">Marca</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        @foreach ($category->subcategories as $subcategory)
                            @foreach ($subcategory->brands as $brand)
                                <tr>
                                    <td class="text-center align-middle">{{ $category->name }}</td>
                                    <td class="text-center align-middle">{{ $subcategory->name }}</td>
                                    <td class="text-center align-middle">{{ $brand->name }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th class="text-center align-middle">Categoría</th>
                        <th class="text-center align-middle">SubCategoría</th>
                        <th class="text-center align-middle">Marca</th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        var products = $('#catSubBrands').DataTable({
            responsive: true,
            ordering: false,
            dom: 'Blfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
            buttons: [{
                    extend: 'excelHtml5',
                    autoFilter: true,
                    filename: 'Data exportada - Categorias&Sub&Brand',
                    sheetName: 'Categorias&Sub&Brand',
                    className: 'btn btn-outline-success',
                    exportOptions: {
                        columns: [0, 1, 2] // Indica las columnas que se desea exportar
                    },
                    footer: false
                },
                {
                    extend: 'csvHtml5',
                    filename: 'Data exportada - Categorias&Sub&Brand',
                    className: 'btn btn-outline-success',
                    exportOptions: {
                        columns: [0, 1, 2] // Indica las columnas que se desea exportar
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
