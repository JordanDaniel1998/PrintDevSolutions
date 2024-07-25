<div class="flex flex-col gap-10 w-11/12 mx-auto">
    <div>
        <p class="font-inter font-medium text-text28">Opiniones de los usuarios</p>
        <p class="text-[#DDDDDD] font-inter font-medium text-text12 capitalize">{{ $posts->count() ? '' : 'Sé el primero en comentar' }}</p>
    </div>

    <div>
        <form action="" method="POST" wire:submit.prevent="saveComment" novalidate class="flex flex-col gap-5">
            <div class="flex flex-col gap-2 w-full">
                <x-text-area-dashboard id="description" type="text" required autocomplete="Escribe un comentario"
                    placeholder="¡Déjanos tu opinión!" name="description" :value="old('description')" rows="5"
                    class="rounded-md border-[#E8ECEF]" wire:model="description" />
                @error('description')
                    <span class="text-red-500 font-medium" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                        {{ str_replace('description', 'descripción', $message) }}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col md:flex-row justify-start items-center md:justify-between gap-10 w-full">
                <div class="w-full">
                    <x-input-label for="stars" :value="__('Calificación')" />
                    <div>
                        <div class="flex justify-start items-center gap-2">
                            @for ($i = 1; $i <= $maxStart; $i++)
                                <div class="cursor-pointer">
                                    <svg width="25" class="transition-transform transform hover:scale-125"
                                        height="25" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" wire:click="setRating({{ $i }})">
                                        <path
                                            d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z"
                                            fill="{{ $i <= $stars ? '#FFAD33' : '#000000' }}"
                                            opacity="{{ $i <= $stars ? 1 : 0.25 }}" />
                                    </svg>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="w-full flex md:justify-end items-center">
                    <button type="submit"
                        class="text-white bg-[#0051FF] py-3 px-10 cursor-pointer rounded-md font-medium w-full md:w-auto">
                        Comentar
                    </button>
                </div>

            </div>
        </form>
    </div>

    <div class="flex flex-col gap-10 pb-20">
        <div class="flex justify-between items-center">
            <p class="text-text28 text-[#000000] font-medium">
                <span>{{ $posts->count() }}</span>
                @choice('Opinión|Opiniones', $posts->count())
            </p>

            <div>
                <select name="selectedCategory" id="selectedCategory"
                    class="py-3 px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-[#E8ECEF] text-[#151515] focus:ring-0  focus:border-black transition-all rounded-md w-full text-left"
                    wire:model="selectedCategory" wire:model.change="selectedCategory">
                    <option value="1">Más recientes</option>
                    <option value="2">5 estrellas</option>
                    <option value="3">A - Z</option>
                    <option value="4">Z - A</option>
                </select>
            </div>
        </div>

        <div>
            @foreach ($posts as $post)
                <div class="flex flex-col md:flex-row justify-start items-start gap-5 md:gap-10 border-b-2 py-5">

                    <div class="flex justify-center items-center">
                        @if ($post->user->imagen_perfil)
                            <img src="{{ asset('storage/users/' . $post->user->imagen_perfil) }}"
                                alt="{{ $post->user->name }}" class="size-20 rounded-full">
                        @else
                            <img src="{{ asset('images/img/avatar.png') }}" alt="{{ $post->user->name }}"
                                class="size-20 rounded-full">
                        @endif
                    </div>
                    <div class="flex flex-col gap-2 w-full">

                        <p class="font-inter font-semibold text-[#141718] text-text20 capitalize">
                            {{ $post->user->name }}
                        </p>

                        <div class="flex justify-start items-center gap-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <div>
                                    <svg width="25" height="25" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z"
                                            fill="{{ $i <= $post->stars ? '#FFAD33' : '#000000' }}"
                                            opacity="{{ $i <= $post->stars ? 1 : 0.25 }}" />
                                    </svg>
                                </div>
                            @endfor
                        </div>

                        <p class="capitalize font-inter font-normal text-[#353945] text-text16">
                            {{ $post->comment }}
                        </p>

                        <div class="flex justify-start items-center gap-2">
                            <span
                                class="text-[#DDDDDD] font-inter font-medium text-text12 capitalize">{{ $post->created_at->diffForHumans() }}</span>
                            @if (auth()->user()->id == $post->user_id)
                                <div class="flex justify-start items-center gap-2">
                                    <button
                                        class="capitalize bg-red-500 text-white px-5 py-1 rounded-lg text-text12 font-medium hover:bg-red-600 md:duration-300"
                                        wire:click="deletePost({{ $post->id }})">
                                        eliminar
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center items-center">
            <button
                class="text-[#151515] font-inter text-text-16 font-semibold bg-[#FFFFFF] px-5 py-2 rounded-xl border-[1px] border-black"
                wire:click="showMorePost">
                Cargar más
            </button>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function() {
            Livewire.on('addedPost', (e) => {
                Swal.fire(
                    '¡Gracias!',
                    'Su comentario fue agregado.',
                    'success'
                );
            });

            Livewire.on('deletePost', (event) => {
                if (event[0].type) {
                    Swal.fire(
                        'Eliminado!',
                        'Su comentario fue eliminado.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error!',
                        'Hubo un error al eliminar su comentario.',
                        'error'
                    );
                }
            });
        });
    </script>
@endpush
