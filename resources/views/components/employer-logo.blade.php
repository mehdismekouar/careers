@props(['image'])

<div {{ $attributes }} class="w-[50px] h-[50px] overflow-hidden relative rounded-xl">
    <img src="{{ asset('/storage/logos/' . $image) }}" class="object-cover absolute inset-0 w-full h-full" alt="">
</div>
