@props(['replace' => false])


<button {{ $attributes(['class' => $replace ? '' : 'w-full text-white bg-blue-800 rounded py-3 px-6 font-bold mt-4']) }}>{{ $slot }}</button>