@props(['image', 'size' => '50'])

@php
    $dimensions = match ($size) {
        '50' => 'w-[50px] h-[50px]',
        '75' => 'w-[75px] h-[75px]',
        '100' => 'w-[100px] h-[100px]',
    };
@endphp

<div {{ $attributes->merge(['class' => "$dimensions overflow-hidden relative rounded-xl"]) }}>
    <img src="{{ asset('/storage/logos/' . $image) }}" class="object-cover absolute inset-0 w-full h-full" alt="">
</div>
