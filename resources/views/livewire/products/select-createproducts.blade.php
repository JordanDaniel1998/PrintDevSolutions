<div class="flex flex-col gap-2">
    <div class="flex flex-col gap-2">
        <x-input-label-dashboard for="category" :value="__('Categoría')" />
        <select id="category" name="category" wire:model="selectedCategory" wire:model.change="selectedCategory"
            class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all">
            <option value="">Selecciona una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <span class="text-red-500 font-medium">
                El campo categoría es requerido.
            </span>
        @enderror
    </div>

    <div class="flex flex-col gap-2 {{ count($subcategories) == 0 ? 'hidden' : '' }}">
        <x-input-label-dashboard for="subcategory" :value="__('Subcategoría')" />
        <select id="subcategory" name="subcategory" wire:model.change="selectedSubcategory"
            class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all"
            {{ count($subcategories) == 0 ? 'disabled' : '' }}>
            <option value="">Selecciona una subcategoría</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
        <x-input-error-dashboard :messages="$errors->get('subcategory')" class="mt-2" />
    </div>

    <div class="flex flex-col gap-2" {{ count($brands) == 0 ? 'hidden' : '' }}>
        <x-input-label-dashboard for="brand" :value="__('Marca')" />
        <select id="brand" name="brand" wire:model="selectedBrand"
            class="w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black transition-all"
            {{ count($brands) == 0 ? 'disabled hidden' : '' }}>
            <option value="">Selecciona una marca</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        <x-input-error-dashboard :messages="$errors->get('brand')" class="mt-2" />
    </div>

</div>
