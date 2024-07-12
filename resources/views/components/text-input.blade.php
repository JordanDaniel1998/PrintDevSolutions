@props(['disabled' => false, 'placeholder' => ''])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full py-3 px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-200 text-[#151515] focus:ring-0  focus:border-black transition-all']) !!} placeholder="{{ $placeholder }}">
