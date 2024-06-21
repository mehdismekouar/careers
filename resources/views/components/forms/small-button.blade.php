@props(['replace' => false])


<button {{ $attributes(['class' => $replace ? '' : 'bg-gray-500']) }}>{{ $slot }}</button>