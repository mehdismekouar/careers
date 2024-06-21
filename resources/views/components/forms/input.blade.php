@props(['label', 'name', 'replace' => false, 'value' => false])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => $replace ? '' : 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name, $value) ?? null
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
