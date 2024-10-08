<tbody>
    @foreach ($partners as $partner)
        <tr>
            <td class="text-left align-middle">{{ $partner->title }}</td>
            <td class="text-left align-middle">
                <img src="{{ asset('storage/partners/' . $partner->imagen) }}" alt="{{ $partner->title }}">
            </td>
            <td class="text-left align-middle">
                <label class="flex justify-start items-center cursor-pointer">
                    <input type="checkbox" data-id="{{ $partner->id }}" {{ $partner->visible ? 'checked' : '' }}
                        class="sr-only toggle-checkbox-visible">
                    <div class="w-16 h-8 bg-gray-300 rounded-full relative">
                        <div class="dot absolute left-2 top-1 bg-white w-6 h-6 rounded-full transition">
                        </div>
                    </div>
                </label>
            </td>
            <td class="text-left align-middle">
                <div class="flex justify-start items-center gap-3">
                    <a href="{{ route('partners.edit', $partner->id) }}"
                        class="bg-yellow-500 p-2 rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>

                    <button type="button" wire:click="$dispatch('deletePartner', {{ $partner->id }})"
                        class="bg-red-600 p-2 rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>

                </div>
            </td>
        </tr>
    @endforeach
</tbody>


@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {

            //  Eliminar un partners
            @this.on('deletePartner', (id) => {

                Swal.fire({
                    title: '¿Eliminar Partner?',
                    text: "Un partner que se elimina no podrá ser recuperado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deletePartnerById', id);

                        Swal.fire(
                            'Eliminado!',
                            'El partner fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endpush
