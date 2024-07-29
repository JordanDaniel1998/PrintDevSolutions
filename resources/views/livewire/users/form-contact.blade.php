<form method="POST" id="formContactos" class="flex flex-col gap-5" wire:submit.prevent="sendFormUser" novalidate>
    @csrf
    <div class="w-full">
        <input required type="text" id="name" name="name" placeholder="Nombre completo"
            class="border-b-[1.5px] border-[#082252] border-t-0 border-l-0 border-r-0 w-full focus:outline-none font-inter font-normal text-text16 md:text-text18 py-3 focus:ring-black" wire:model="name">
    </div>

    <div class="w-full">
        <input required type="tel" id="telefono" name="cellphone" placeholder="Teléfono" maxlength="9"
            class="border-b-[1.5px] border-[#082252] border-t-0 border-l-0 border-r-0 w-full focus:outline-none font-inter font-normal text-text16 md:text-text18 py-3 focus:ring-black" wire:model="cellphone">
    </div>

    <div class="w-full">
        <input required type="email" id="email" name="email" placeholder="E-mail"
            class="border-b-[1.5px] border-[#082252] border-t-0 border-l-0 border-r-0 w-full focus:outline-none font-inter font-normal text-text16 md:text-text18 py-3 focus:ring-black" wire:model="email">
    </div>

    <div class="w-full">
        <input required type="text" id="message" name="message" placeholder="Mensaje"
            class="border-b-[1.5px] border-[#082252] border-t-0 border-l-0 border-r-0 w-full focus:outline-none font-inter font-normal text-text16 md:text-text18 py-3 focus:ring-black" wire:model="message">
    </div>

    <div class="flex justify-center items-center pt-3">
        <button type="submit"
            class="font-inter font-bold text-text16 md:text-text18 text-white py-3 px-10 bg-[#0051FF] w-full text-center hover:bg-blue-700 md:duration-300">
            Enviar Solicitud
        </button>
    </div>
</form>
@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function() {
            Livewire.on('showAlertFormError', (e) => {
                Swal.fire({
                    title: "Error!",
                    text: e[0].message,
                    icon: "error",
                });
            });

            Livewire.on('showAlertFormUser', (e) => {
                Swal.fire({
                    title: "Gracias!",
                    text: e[0].message,
                    icon: "success",
                });
            });
        });
    </script>
@endpush
