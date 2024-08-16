@extends('admin.layouts.app')

@section('contenido')
    <section class="shadow-md border-2 px-3 md:!px-10 py-10">
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                class="uppercase border p-3 my-3 text-md font-bold
                            {{ session('type') === 'success' ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }}">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('admin.store') }}" method="POST" class="flex flex-col gap-3" novalidate>
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 lg:!gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="address" :value="__('Dirección')" />
                    <x-input-text-dashboard id="address" type="text" required autocomplete="Dirección"
                        placeholder="Dirección" name="address" value="{{ $informations->address }}" />
                    @error('address')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('address', 'dirección', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="inside" :value="__('Oficina')" />
                    <x-input-text-dashboard id="inside" type="text" required autocomplete="Oficina"
                        placeholder="Oficina" name="inside" value="{{ $informations->inside }}" />
                    @error('inside')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('inside', 'Oficina', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="district" :value="__('Distrito')" />
                    <x-input-text-dashboard id="district" type="text" required autocomplete="Distrito"
                        placeholder="Distrito" name="district" value="{{ $informations->district }}" />
                    @error('district')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('district', 'distrito', $message) }}
                        </span>
                    @enderror
                </div>


                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="city" :value="__('Ciudad')" />
                    <x-input-text-dashboard id="city" type="text" required autocomplete="Ciudad"
                        placeholder="Ciudad" name="city" value="{{ $informations->city }}" />
                    @error('city')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('city', 'ciudad', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="country" :value="__('País')" />
                    <x-input-text-dashboard id="country" type="text" required autocomplete="País" placeholder="País"
                        name="country" value="{{ $informations->country }}" />
                    @error('country')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('country', 'país', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="cellphone" :value="__('Número de celular')" />
                    <x-input-text-dashboard id="cellphone" type="text" required autocomplete="Celular"
                        placeholder="+51 987654321" name="cellphone" value="{{ $informations->cellphone }}" />
                    @error('cellphone')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('cellphone', 'celular', $message) }}
                        </span>
                    @enderror
                </div>


                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="office_phone" :value="__('Teléfono')" />
                    <x-input-text-dashboard id="office_phone" type="text" required autocomplete="Teléfono"
                        placeholder="+51 987654321" name="office_phone" value="{{ $informations->office_phone }}" />
                    @error('office_phone')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('office_phone', 'teléfono', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="email" :value="__('Correo electrónico')" />
                    <x-input-text-dashboard id="email" type="email" required autocomplete="Correo electrónico"
                        placeholder="Correo electrónico" name="email" value="{{ $informations->email }}" />
                    @error('email')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('email', 'email', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="facebook" :value="__('Facebook')" />
                    <x-input-text-dashboard id="facebook" type="text" required autocomplete="Enlace de facebook"
                        placeholder="Enlace de facebook" name="facebook" value="{{ $informations->facebook }}" />
                    @error('facebook')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('facebook', 'facebook', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="instagram" :value="__('Instagram')" />
                    <x-input-text-dashboard id="instagram" type="text" required autocomplete="Enlace de instagram"
                        placeholder="Enlace de instagram" name="instagram" value="{{ $informations->instagram }}" />
                    @error('instagram')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('instagram', 'instagram', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="youtube" :value="__('Youtube')" />
                    <x-input-text-dashboard id="youtube" type="text" required autocomplete="Enlace de youtube"
                        placeholder="Enlace de youtube" name="youtube" value="{{ $informations->youtube }}" />
                    @error('youtube')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('youtube', 'youtube', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="twitter" :value="__('Twitter')" />
                    <x-input-text-dashboard id="twitter" type="text" required autocomplete="Enlace de twitter"
                        placeholder="Enlace de twitter" name="twitter" value="{{ $informations->twitter }}" />
                    @error('twitter')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('twitter', 'twitter', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="linkedin" :value="__('Linkedin')" />
                    <x-input-text-dashboard id="linkedin" type="text" required autocomplete="Enlace de linkedin"
                        placeholder="Enlace de linkedin" name="linkedin" value="{{ $informations->linkedin }}" />
                    @error('linkedin')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('linkedin', 'linkedin', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="tiktok" :value="__('Tiktok')" />
                    <x-input-text-dashboard id="tiktok" type="text" required autocomplete="Enlace de tiktok"
                        placeholder="Enlace de tiktok" name="tiktok" value="{{ $informations->tiktok }}" />
                    @error('tiktok')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('tiktok', 'tiktok', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="whatsapp" :value="__('Whatsapp')" />
                    <x-input-text-dashboard id="whatsapp" type="text" required autocomplete="Enlace de whatsapp"
                        placeholder="Enlace de whatsapp" name="whatsapp" value="{{ $informations->whatsapp }}" />
                    @error('whatsapp')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('tiktok', 'whatsapp', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="check_in" :value="__('Entrada')" />
                    <x-input-text-dashboard id="check_in" type="text" required autocomplete="Hora de ingreso"
                        placeholder="Hora de ingreso" name="check_in" value="{{ $informations->check_in }}" />
                    @error('check_in')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('check_in', 'hora de ingreso', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="check_out" :value="__('Salida')" />
                    <x-input-text-dashboard id="check_out" type="text" required autocomplete="Hora de salida"
                        placeholder="Hora de salida" name="check_out" value="{{ $informations->check_out }}" />
                    @error('check_out')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('check_out', 'hora de salida', $message) }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="grid grid-cols-1 gap-3 lg:!gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="message_whatsapp" :value="__('Mensaje de whatsapp')" />
                    <x-input-text-dashboard id="message_whatsapp" type="text" required
                        autocomplete="Mensaje de whatsapp" placeholder="Mensaje de whatsapp" name="message_whatsapp"
                        value="{{ $informations->message_whatsapp }}" />
                    @error('message_whatsapp')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('message_whatsapp', 'mensaje', $message) }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 w-full">
                    <x-input-label-dashboard for="aboutUs" :value="__('Sobre nosotros')" />
                    <x-input-text-dashboard id="aboutUs" type="text" required autocomplete="Sobre nosotros"
                        placeholder="Sobre nosotros" name="aboutUs"
                        value="{{ $informations->aboutUs }}" />
                    @error('aboutUs')
                        <span class="text-red-500 font-medium">
                            {{ str_replace('aboutUs', 'sobre nosotros', $message) }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-start items-center mt-4">
                <button type="submit"
                    class="w-full md:w-auto bg-indigo-500 hover:bg-indigo-600 md:duration-300 text-white font-outfit px-4 py-2.5 justify-center items-center gap-2 rounded-lg inline-flex no-underline">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    Guardar Información
                </button>

            </div>
        </form>
    </section>
@endsection
