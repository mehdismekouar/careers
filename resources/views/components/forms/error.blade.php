@props(['error' => false])

@if ($error)
    <p class="text-left text-sm text-red-500 mt-2">{{ $error }}</p>
@endif