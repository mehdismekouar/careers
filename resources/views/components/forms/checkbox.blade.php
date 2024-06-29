@props(['label', 'name', 'wrap' => true, 'value' => false])

@php
    $checked = match (old('posting')) {
        null => $value ? 'checked' : '',
        default => old($name) ? 'checked' : '',
    };

    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
    ];
@endphp

<x-forms.field :$label :$name :$checked :$wrap>
    <div
        class="{{ $wrap ? 'rounded-xl bg-gray-50 dark:bg-white/10 border dark:border-white/10 px-5 py-4 w-full' : '' }}">
        <input {{ $attributes->merge($defaults) }} {{ $checked }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>
