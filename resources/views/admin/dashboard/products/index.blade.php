@extends('admin.layouts.app')

@push('styles')
    <style>
        .toggle-checkbox:checked+div .dot {
            transform: translateX(100%);
        }

        .toggle-checkbox:checked+div {
            background-color: #4ade80;
        }
    </style>
@endpush

@section('contenido')
    <section class="flex flex-col gap-10 lg:pt-10">
        <div>
            <a href="{{ route('products.create') }}"
                class="bg-black text-white font-outfit px-5 py-2.5  justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <span>Agregar producto</span>
            </a>
        </div>

        <div class="p-10 shadow-md border">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Título</th>
                        <th class="text-center align-middle">Imagen</th>
                        <th class="text-center align-middle">Precio</th>
                        <th class="text-center align-middle">Stock</th>
                        <th class="text-center align-middle">Visible</th>
                        <th class="text-center align-middle">Destacado</th>
                        <th class="text-center align-middle">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th class="text-center align-middle">{{ $product->title }}</th>
                            <th class="flex justify-center items-center">
                                <img src="{{ asset('storage/uploads/' . $product->imagen) }}" class="w-12 md:w-36"
                                    alt="{{ $product->imagen }}">
                            </th>
                            <th class="text-center align-middle">{{ $product->price }}</th>
                            <th class="text-center align-middle">{{ $product->stock }}</th>
                            <th class="text-center align-middle">
                                <label class="flex justify-center items-center cursor-pointer">
                                    <!-- Hidden Checkbox -->
                                    <input type="checkbox" class="sr-only toggle-checkbox">
                                    <!-- Switch Background -->
                                    <div class="w-16 h-8 bg-gray-300 rounded-full relative">
                                        <!-- Switch Knob -->
                                        <div class="dot absolute left-2 top-1 bg-white w-6 h-6 rounded-full transition">
                                        </div>
                                    </div>
                                </label>
                            </th>
                            <th class="text-center align-middle">
                                <label class="flex justify-center items-center cursor-pointer">
                                    <!-- Hidden Checkbox -->
                                    <input type="checkbox" class="sr-only toggle-checkbox">
                                    <!-- Switch Background -->
                                    <div class="w-16 h-8 bg-gray-300 rounded-full relative">
                                        <!-- Switch Knob -->
                                        <div class="dot absolute left-2 top-1 bg-white w-6 h-6 rounded-full transition">
                                        </div>
                                    </div>
                                </label>
                            </th>
                            <th class="text-center align-middle">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 p-2 rounded-md text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>

                                    <form action="" method="POST">
                                        @method('DELETE')
                                        <button class="bg-red-600 p-2 rounded-md text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center align-middle">Título</th>
                        <th class="text-center align-middle">Imagen</th>
                        <th class="text-center align-middle">Precio</th>
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
