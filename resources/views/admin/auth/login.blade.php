<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - PrintDevSolutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-inter flex justify-center items-center h-screen">

    <main class="bg-slate-100 w-full h-full flex flex-col justify-center items-center">
        <section class="w-full flex flex-col justify-center items-center">
            <div class="w-11/12 mx-auto lg:max-w-[600px] my-auto flex flex-col pb-5">
                <h2 class="text-center font-bold bg-amber-300 py-2">Credenciales para poder ingresar al panel administrativo</h2>
                <div class="mt-2">
                    <p class="text-red-600 font-bold">Email: <span class="font-normal text-black">admin@admin.com</span> </p>
                    <p class="text-red-600 font-bold">Contraseña: <span class="font-normal text-black">123456789</span> </p>
                </div>
            </div>
            <div class="w-11/12 mx-auto lg:max-w-[600px] my-auto flex flex-col gap-10 shadow-md border p-10 bg-white">
                <div>
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                            class="uppercase border p-5 my-3 text-md font-bold
                            {{ session('type') === 'success' ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.login') }}" method="POST" class="flex flex-col gap-5" novalidate>
                        @csrf

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="email_login" :value="__('Email')" />
                            <x-text-input id="email_login" type="email" required autocomplete="Correo Electrónico"
                                placeholder="Correo electrónico" name="email" />
                        </div>

                        <div data-aos="fade-up" data-aos-offset="150" class="flex flex-col gap-2">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input id="password" type="password" required autocomplete="Contraseña"
                                placeholder="*******" name="password" />
                        </div>

                        <div class="w-full pt-10">
                            <input type="submit"
                                class="bg-[#0051FF] text-white font-bold font-inter py-3 text-center text-text16 md:text-text18 w-full inline-block cursor-pointer hover:bg-blue-700 md:duration-300"
                                value="Ingresar">
                        </div>
                    </form>


                </div>
            </div>

        </section>

    </main>


    @livewireScripts
</body>

</html>
