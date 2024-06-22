@props(['label', 'name', 'value' => false])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'checked' => old($name, $value) ? 'checked' : null,
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-gray-50 dark:bg-white/10 border dark:border-white/10 px-5 py-4 w-full">
        <input {{ $attributes($defaults) }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>
