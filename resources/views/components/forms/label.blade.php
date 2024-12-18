@props(['name', 'label'])

<div class="inline-flex items-center space-x-2 mb-2">
    <span class="w-2 h-2 dark:bg-white bg-black inline-block"></span>
    <label class="font-bold" for="{{ $name }}">{{ $label }}</label>
</div>
