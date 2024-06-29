@props(['label', 'name', 'wrap' => true])

@if ($wrap)
    <div class="my-4 grow">
        @if ($label)
            <x-forms.label :$name :$label />
        @endif
@endif
<div class="grow">
    {{ $slot }}

    <x-forms.error :error="$errors->first($name)" />
</div>
@if ($wrap)
    </div>
@endif
