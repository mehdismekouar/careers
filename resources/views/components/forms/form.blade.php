@props(['method' => 'GET'])

@php
    $methods = [
        'GET' => 'GET',
        'POST' => 'POST',
        'PUT' => 'POST',
        'PATCH' => 'POST',
        'DELETE' => 'POST',
    ];

@endphp

<form {{ $attributes(['class' => 'max-w-2xl mx-auto', 'method' => $methods[$method]]) }}>

    @if ($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
