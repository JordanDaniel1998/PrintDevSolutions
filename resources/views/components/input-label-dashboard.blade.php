@props(['value'])

<label {{ $attributes->merge(['class' => 'font-normal font-inter text-text14 text-[#6C7275]']) }}>
    {{ $value ?? $slot }}
</label>
