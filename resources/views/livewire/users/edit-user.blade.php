<form method="POST" class="flex flex-col gap-5 mb-10" wire:submit.prevent="updateUser" novalidate>

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="uppercase border p-5 my-3 text-md font-bold
                {{ session('type') === 'success' ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }}">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-text20 xl:text-text22 font-bold font-inter text-[#151515]">
        Detalles de la cuenta
    </h2>

    <div class="flex flex-col gap-5">
        <div class="flex flex-col gap-5">
            <div class="flex flex-col gap-2 w-full">
                <x-input-label for="name" :value="__('Nombres')" />
                <x-text-input id="name" type="text" required autocomplete="Nombres" placeholder="Nombres"
                    name="name" :value="old('name')" wire:model="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2 w-full">
                <x-input-label for="last" :value="__('Apellidos')" />
                <x-text-input id="last" type="text" required autocomplete="Apellidos" placeholder="Apellidos"
                    name="last" :value="old('last')" wire:model="last" />
                <x-input-error :messages="$errors->get('last')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" type="text" required autocomplete="Username" placeholder="Username"
                    name="username" :value="old('username')" wire:model="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2">
                <x-input-label for="email_login" :value="__('Email')" />
                <x-text-input id="email_login" type="email" required autocomplete="Correo Electrónico"
                    placeholder="Correo electrónico" name="email" :value="old('emal')" wire:model="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="imagen_nueva" :value="__('Foto de perfil nueva')" />
            <x-text-input id="imagen_nueva" type="file" name="imagen_nueva" accept="image/*" required
                wire:model="imagen_nueva" />
        </div>

        @if ($imagen_nueva)
            <div class="flex flex-col gap-2">
                <x-input-label :value="__('Foto de perfil nueva')" />
                <div class="flex justify-start items-center">
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="{{ $name }}" class="w-40 h-40">
                </div>
            </div>
        @endif


    </div>

    <div class="my-5">
        <hr class="bg-[#151515] h-[2px]" />
    </div>

    <h2 class="text-text20 md:text-text22 font-bold font-inter text-[#151515]">
        Contraseña
    </h2>

    <div class="flex flex-col gap-2">
        <x-input-label for="password" :value="__('Contraseña')" />
        <x-text-input id="password" type="password" required autocomplete="Contraseña" placeholder="*******"
            name="password" wire:model="password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex flex-col gap-2">
        <x-input-label for="password_nuevo" :value="__('Nueva Contraseña')" />
        <x-text-input id="password_nuevo" type="password" required autocomplete="Contraseña" placeholder="*******"
            name="password_nuevo" wire:model="password_nuevo" />
        <x-input-error :messages="$errors->get('password_nuevo')" class="mt-2" />
    </div>

    <div class="flex flex-col gap-2">
        <x-input-label for="password_nuevo_confirmation" :value="__('Repetir nueva contraseña')" />
        <x-text-input id="password_nuevo_confirmation" type="password" required autocomplete="Contraseña"
            placeholder="*******" name="password_nuevo_confirmation" wire:model="password_nuevo_confirmation" />
    </div>

    <div class="flex gap-5 flex-col md:flex-row pt-10">
        <input type="submit" value="Guardar cambios"
            class="text-white bg-[#0051FF] py-3 px-5  cursor-pointer border-2 font-bold font-inter text-text18 text-center border-none inline-block" />

        <input type="submit" value="Cancelar"
            class="text-[#FFFFFF] py-3 px-5 cursor-pointer font-bold font-inter text-text18 text-center inline-block border-[1px] border-[#151515] bg-[#001232]" />
    </div>
</form>
