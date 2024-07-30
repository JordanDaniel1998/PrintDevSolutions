<div>
    <div class="flex flex-col gap-5">
        <div class="w-full flex flex-col gap-5">
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input type="radio" id="bordered-radio-2" name="deliveryMethod" wire:model="deliveryMethod"
                    wire:model.change="deliveryMethod" value="express"
                    class="focus:ring-transparent w-5 h-5 cursor-pointer" />
                <label for="bordered-radio-2"
                    class="w-full py-4 ms-2 text-text16 xl:text-text18 font-inter font-normal text-[#151515] flex justify-between items-center px-4">
                    <span>Envío express</span>
                    <span>S/ {{ number_format(15.0, 2) }}</span>
                </label>
            </div>

            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input type="radio" id="bordered-radio-3" name="deliveryMethod" wire:model="deliveryMethod"
                    value="recoger" wire:model.change="deliveryMethod"
                    class="w-5 h-5 focus:ring-transparent cursor-pointer" />
                <label for="bordered-radio-3"
                    class="w-full py-4 ms-2 text-text16 xl:text-text18 font-inter font-normal text-[#151515] flex justify-between items-center px-4">
                    <span>Recoger</span>
                    <span>% {{ number_format(10.0, 2) }}</span>
                </label>
            </div>
        </div>

        <div class="text-[#151515] flex justify-between items-center text-text14 xl:text-text18">
            <p class="font-inter font-normal">SubTotal</p>
            <span class="font-inter font-bold">S/ {{ number_format($subTotal, 2) }}</span>
        </div>

        <div class="text-[#151515] flex justify-between items-center text-text14 xl:text-text18">
            <p class="font-inter font-normal">IGV (18%)</p>
            <span class="font-inter font-bold">S/ {{ number_format($impuesto, 2) }}</span>
        </div>

        <div class="text-[#151515] flex justify-between items-center text-text20 xl:text-text22">
            <p class="font-inter font-bold">Total</p>
            <span class="font-inter font-bold">S/ {{ number_format($total, 2) }}</span>
        </div>

        <a wire:click.prevent="redirectToNext"
            class="text-white bg-[#0051FF] w-full py-3 cursor-pointer font-inter font-bold text-text16 xl:text-text18 inline-block text-center mt-5">
            Siguiente
        </a>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('showAlertCart', (e) => {
                Swal.fire(
                    'Estas a un paso de completar tu compra!',
                    'Por favor, seleccione una opción de envío.',
                    'warning'
                );
            });
        });
    </script>
@endpush
