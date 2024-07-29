<div class="flex flex-col gap-5">
    <div>
        <a wire:click.prevent="resetFilter"
            class="focus:outline-none font-inter font-bold text-text16 xl:text-text18 mr-20 text-[#0051FF] border-[1.5px] border-gray-200 py-3 px-4 flex justify-between items-center w-full cursor-pointer {{ $allProducts ? '' : 'bg-[#0051FF] text-white' }}">
            <span>Todos las productos</span>
        </a>

    </div>
    <div class="flex flex-col gap-5 lg:flex-row lg:justify-between lg:gap-0 pb-10">

        <div class="flex flex-col lg:flex-row lg:justify-start gap-3">
            <div class="relative inline-block text-left w-auto">
                <div class="group">
                    <button type="button"
                        class="focus:outline-none font-inter font-bold text-text16 xl:text-text18 mr-20 text-[#0051FF] border-[1.5px] border-gray-200 py-3 px-4 flex justify-between items-center w-full">

                        <span>Categorías</span>

                        <!-- Dropdown arrow -->
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6.00081 5.58L11 1" stroke="#0051FF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>

                    <!-- Dropdown menu -->
                    <div
                        class="absolute left-0 w-full  origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-[100]">
                        <div class="flex flex-col justify-start">
                            @foreach ($categories as $category)
                                <a wire:click.prevent="filterSubCategoryByCategory('{{ $category->id }}')"
                                    class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedCategory == $category->id ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative inline-block text-left w-auto">
                <div class="group">
                    <button type="button"
                        class="focus:outline-none font-inter font-bold text-text16 xl:text-text18 mr-20 text-[#0051FF] border-[1.5px] border-gray-200 py-3 px-4 flex justify-between items-center w-full">

                        <span>Sub Categorías</span>

                        <!-- Dropdown arrow -->
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6.00081 5.58L11 1" stroke="#0051FF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>

                    <!-- Dropdown menu -->
                    <div
                        class="absolute left-0 w-full  origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300  z-[100]">
                        <div class="flex flex-col justify-start ">
                            @foreach ($subcategories as $subcategory)
                                <a wire:click.prevent="filterBrandBySubCategory('{{ $subcategory->id }}')"
                                    class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedSubCategory == $subcategory->id ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative inline-block text-left w-auto">
                <div class="group">
                    <button type="button"
                        class="focus:outline-none font-inter font-bold text-text16 xl:text-text18 mr-20 text-[#0051FF] border-[1.5px] border-gray-200 py-3 px-4 flex justify-between items-center w-full">

                        <span>Marca</span>

                        <!-- Dropdown arrow -->
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6.00081 5.58L11 1" stroke="#0051FF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>

                    <!-- Dropdown menu -->
                    <div
                        class="absolute left-0 w-full  origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300  z-[100]">
                        <div class="flex flex-col justify-start ">
                            @foreach ($brands as $brand)
                                <a wire:click.prevent="filterByBrand('{{ $brand->id }}')"
                                    class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedBrand == $brand->id ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                                    {{ $brand->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative inline-block text-left w-auto">
            <div class="group">
                <button type="button"
                    class="focus:outline-none font-inter font-bold text-text16 xl:text-text18 mr-20 text-[#0051FF] border-[1.5px] border-gray-200 py-3 px-4 flex justify-between items-center w-full">

                    <span>Ordenar</span>

                    <!-- Dropdown arrow -->
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L6.00081 5.58L11 1" stroke="#0051FF" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </button>

                <!-- Dropdown menu -->
                <div
                    class="absolute left-0 w-full  origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-[100]">
                    <div class="flex flex-col justify-start ">
                        <a wire:click.prevent="filterByAscPrices"
                            class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedOrders === 'asc_prices' ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                            Precios de menor a mayor
                        </a>
                        <a wire:click.prevent="filterByDescPrices"
                            class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedOrders === 'desc_prices' ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                            Precios de mayor a menor
                        </a>
                        <a wire:click.prevent="filterByProductDiscount"
                            class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedOrders === 'discount_products' ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                            Productos con descuento
                        </a>
                        <a wire:click.prevent="filterByProductsRecent"
                            class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedOrders === 'recent_products' ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                            Productos más recientes
                        </a>
                        <a wire:click.prevent="filterByProductsLaunch"
                            class="bg-[#0051FF] w-full py-3 text-left px-4 text-white font-inter font-bold hover:bg-[#3374FF] text-text16 cursor-pointer {{ $selectedOrders === 'launch_products' ? 'bg-[#3374FF] bg-opacity-100' : 'bg-opacity-25' }}">
                            Productos en lanzamientos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
