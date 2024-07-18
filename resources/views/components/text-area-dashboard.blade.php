@props(['disabled' => false, 'placeholder' => '', 'rows' => '', 'value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full !py-3 !px-4 focus:outline-none placeholder-gray-400 font-normal font-inter text-text16 md:text-text18 border-[1px] border-gray-400 text-[#151515] focus:ring-0  focus:border-black']) !!} placeholder="{{ $placeholder }}" rows="{{ $rows }}">{{ $value }}</textarea>
