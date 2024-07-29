<form id="formSubscribers" wire:submit.prevent="createSubs" novalidate>
    @csrf
    <div class="relative w-full rounded-lg flex justify-center items-center">
        <input type="email" placeholder="hola@hotmail.com" name="email" wire:model="email" id="email"
            class="placeholder:text-[#565656] font-medium font-inter text-text12 md:text-text14 w-full border-none outline-none focus:outline-none pl-5 pr-4 py-4 text-[#565656]">
        <input type="text" name="username" hidden wire:model="username" />
        <div class="absolute inset-y-0 right-0  flex items-center pl-3">
            <button type="submit"
                class="text-[#0051FF] font-bold font-inter text-text12 md:text-text14 pr-5 pl-4 py-4">
                Suscriberme
            </button>
        </div>
    </div>

    @error('email')
        <span class="text-red-500 font-medium" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            {{ str_replace('email', 'correo', $message) }}
        </span>
    @enderror
</form>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function() {
            Livewire.on('showAlertConfig', (e) => {
                Swal.fire({
                    title: "Error!",
                    text: e[0].message,
                    icon: "error",
                });
            });

            Livewire.on('showMessageProcessing', (e) => {
                Swal.fire({
                    title: "Gracias!",
                    text: e[0].message,
                    icon: "success",
                });
            });
        });
    </script>
@endpush
