<div class="flex flex-col justify-center items-start gap-2">
    <x-input-label-dashboard for="specifications" :value="__('Especificaciones')" />

    @foreach ($specifications as $index => $spec)
        <div class="flex flex-col gap-2 w-full">
            <div class="flex flex-row justify-between items-center gap-2 w-full">
                <div class="flex flex-row justify-center items-center gap-2 w-full">
                    <x-input-text-dashboard type="text" name="specifications.{{ $index }}.key"
                        wire:model="specifications.{{ $index }}.key" placeholder="Especificación" />

                    <x-input-text-dashboard type="text" name="specifications.{{ $index }}.value"
                        wire:model="specifications.{{ $index }}.value" placeholder="Valor" />
                </div>
                <div class="flex justify-center items-center">
                    @if ($index >= 1)
                        <button type="button" wire:click="removeSpecification({{ $index }})">
                            <div class="flex justify-center items-center bg-red-500 rounded-full p-1 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </button>
                    @else
                        <button type="button" wire:click="addSpecification">
                            <div class="flex justify-center items-center bg-blue-500 rounded-full p-1 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
            @error('specifications.' . $index . '.specification_value')
                <p class="text-red-500 font-medium">
                    Este campo es obligatorio
                </p>
            @enderror
        </div>
    @endforeach
</div>
