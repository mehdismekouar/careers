@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-3">
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between w-full">
            <p
                class="max-sm:pt-2 sm:pr-5 max-sm:text-center text-sm text-gray-500 leading-5 dark:text-gray-400 text-nowrap">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>

            <div
                class="flex-wrap max-sm:mt-3 max-sm:text-center max-sm:w-full relative z-0 inline-flex justify-center rtl:flex-row-reverse">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span
                            class="my-1 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-gray-100/25 border border-gray-300  cursor-default rounded-l-md leading-5 dark:bg-white/10 dark:border-gray-700"
                            aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="my-1 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-gray-100/25 border border-gray-300  rounded-l-md leading-5 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-white/10 dark:border-gray-700 dark:active:bg-gray-700 hover:bg-blue-600 dark:hover:bg-blue-600 dark:hover:text-gray-100 hover:text-gray-100"
                        aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span
                                class="my-1 relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 dark:text-gray-400 bg-black/10 border border-gray-300  cursor-default leading-5 dark:bg-white/10 dark:border-gray-700">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span
                                        class="my-1 relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 dark:text-gray-400 border border-gray-300  cursor-default leading-5 dark:bg-white/20 bg-black/10 dark:border-gray-700">{{ $page }}</span>
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="my-1 relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-gray-100/25 border border-gray-300  leading-5  hover:bg-blue-600 dark:hover:bg-blue-600 dark:hover:text-gray-100 hover:text-gray-100 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-white/10 dark:border-gray-700 dark:text-gray-400 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="my-1 relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-gray-100/25 border border-gray-300  rounded-r-md leading-5 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-white/10 dark:border-gray-700 dark:active:bg-gray-700 dark:f hover:bg-blue-600 dark:hover:bg-blue-600 dark:hover:text-gray-100 hover:text-gray-100"
                        aria-label="{{ __('pagination.next') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span
                            class="my-1 relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-gray-100/25 border border-gray-300  cursor-default rounded-r-md leading-5 dark:bg-white/10 dark:border-gray-700"
                            aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
