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
            <a href="{{ route('partners.create') }}"
                class="bg-indigo-500 hover:bg-indigo-700 md:duration-300 text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                Agregar Partners
            </a>
        </div>

        <div class="p-10 shadow-md border">
            <table id="partners" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Título</th>
                        <th class="!text-left align-middle">Imagen</th>
                        <th class="text-left align-middle">Visible</th>
                        <th class="text-left align-middle">Acciones</th>
                    </tr>
                </thead>

                <!-- livewire -->
                <livewire:partners.show-partners />

                <tfoot>
                    <tr>
                        <th class="text-left align-middle">Título</th>
                        <th class="!text-left align-middle">Imagen</th>
                        <th class="text-left align-middle">Visible</th>
                        <th class="text-left align-middle">Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Datatables
            var partners = $('#partners').DataTable({
                responsive: true,
                ordering: false,
                dom: 'lfrtip', // Define la posición de los botones (B: botones, l:cantidad de filas, f: filtro, r: procesamiento, t: tabla, i: información, p: paginación)
                topStart: {
                    buttons: ['pageLength']
                }
            });


            // Actualiza el estado del campo visible
            $('#partners').on('change', '.toggle-checkbox-visible', function() {
                var visible = $(this).prop('checked') ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: '/admin/partners/visible',
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
                            `El partner ${message}`,
                            'success'
                        )
                    },
                    error: function(data) {
                        console.error('Error:', data);
                    }
                });
            });
        });
    </script>
@endpush
