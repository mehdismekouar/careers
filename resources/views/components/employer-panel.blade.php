<div {{ $attributes->merge(['class' => 'p-4 dark:bg-white/10 bg-gray-100/25 rounded-xl flex flex-col text-center justify-between border border-transparent shadow-[0_0px_15px_-5px_rgba(0,0,0,0.3)] hover:shadow-[0_0px_15px_-3px_rgba(37,99,235,1)] dark:hover:border-blue-600 transition duration-150 group']) }}>
    {{ $slot }}
</div>