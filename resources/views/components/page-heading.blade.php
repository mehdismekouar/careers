<div {{ $attributes->merge(['class' => 'relative px-20 py-10 font-bold text-center text-4xl']) }}><a
        class="absolute text-3xl left-0 ml-5 bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 hover:bg-gray-200 rounded-full p-3"
        href="./">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
        </svg>
    </a>{{ $slot }}</div>
