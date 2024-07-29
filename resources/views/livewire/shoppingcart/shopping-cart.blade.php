<div class="modal__info flex flex-col justify-between">
    <div class="modal__header">
        <p class="font-inter font-medium text-text28">Carrito</p>
    </div>
    <div class="modal__body">
        <div class="modal__list">
            @foreach ($carts as $cart)
                <div class="flex justify-between border-b-[1px] pb-5">
                    <div class="flex justify-center items-center gap-2">
                        <div class="rounded-md p-4">
                            <img src="{{ asset('storage/uploads/' . $cart['image']) }}" alt="producto" class="w-24" />
                        </div>
                        <div class="flex flex-col gap-3 py-2">
                            <h3 class="font-inter font-bold text-text14 md:text-text18 text-[#151515]">
                                {{ $cart['title'] }}
                            </h3>
                            <p
                                class="font-inter font-normal text-[12px] md:text-text16 text-[#6C7275] flex justify-start items-center gap-2">
                                Color: <span class="w-5 h-5 inline-block rounded-full border-2"
                                    style="background-color: {{ $cart['color'] ? $cart['color'] : '' }};"></span>
                            </p>
                            <div>
                                <div
                                    class="inline-flex justify-start items-center divide-x-2 divide-gray-200 border-2 border-gray-200 text-black font-inter font-bold">
                                    <button class="px-3 py-1" type="button"
                                        wire:click.prevent="handleDecrement({{ $cart['id'] }})">-</button>
                                    <span class="px-3 py-1">{{ $cart['quantity'] }}</span>
                                    <button class="px-3 py-1" type="button"
                                        wire:click.prevent="handleIncrement({{ $cart['id'] }})">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
                        <p class="font-inter font-bold text-[14px] md:text-text18 text-[#151515]">
                            S/ {{ $cart['price'] }}
                        </p>
                        <div class="flex justify-center items-center">
                            <button type="buttton" wire:click.prevent="deleteProductFromCart('{{ $cart['id'] }}')">
                                <svg width="17" height="17" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.529247 0.529247C0.789596 0.268897 1.21171 0.268897 1.47206 0.529247L5.00065 4.05784L8.52925 0.529247C8.7896 0.268897 9.21171 0.268897 9.47206 0.529247C9.73241 0.789596 9.73241 1.21171 9.47206 1.47206L5.94346 5.00065L9.47206 8.52925C9.73241 8.7896 9.73241 9.21171 9.47206 9.47206C9.21171 9.73241 8.7896 9.73241 8.52925 9.47206L5.00065 5.94346L1.47206 9.47206C1.21171 9.73241 0.789596 9.73241 0.529247 9.47206C0.268897 9.21171 0.268897 8.7896 0.529247 8.52925L4.05784 5.00065L0.529247 1.47206C0.268897 1.21171 0.268897 0.789596 0.529247 0.529247Z"
                                        fill="#6C7275" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal__footer">
        <div class="flex flex-col gap-2 pt-36">
            <div class="text-[#141718] flex justify-between items-center">
                <p class="font-inter font-normal text-[16px]">Subtotal</p>
                <p class="font-inter font-bold text-[16px]">S/ {{$subTotal}}</p>
            </div>

            <div class="text-[#141718] flex justify-between items-center">
                <p class="font-inter font-normal text-[16px]">IGV (18%)</p>
                <p class="font-inter font-bold text-[16px]">S/ {{$impuesto}}</p>
            </div>

            <div class="text-[#141718] font-inter font-medium text-[20px] flex justify-between items-center">
                <p>Total</p>
                <p>S/ {{$total}}</p>
            </div>
            <div>
                <a href=""
                    class="font-inter font-bold text-base bg-[#0051FF] py-3 px-5 text-white cursor-pointer w-full inline-block text-center">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
