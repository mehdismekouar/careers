@props(['job', 'featured' => false])

<x-job-panel
    class="relative flex-grow-0 flex-shrink-0 w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.33%-1rem)] min-h-[250px]">
    @if ($featured)
        <span class="absolute rounded-xl w-3 h-3 -top-1 -right-1 bg-blue-600"></span>
    @endif
    <div class="text-sm text-gray-500 flex justify-between gap-x-2">
        <a class="group-hover:text-blue-600 hover:underline transition duration-150"
            href="{{ route('employer.jobs', ['employer' => $job->employer->id]) }}">{{ $job->employer->name }}</a>
        <x-employer-logo :image="basename($job->employer->logo)" />
    </div>
    <div class="font-bold">
        <a href="{{ $job->url }}" target="_blank"
            class="text-lg group-hover:text-blue-600 hover:underline transition duration-150">{{ $job->title }}</a>
        <p class="text-sm text-gray-400 mt-2">${{ $job->salary }} USD</p>
        <p class="mt-2 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mt-0.5 size-4 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <span class="ml-1 text-sm text-left text-gray-500">{{ $job->location }} - {{ $job->schedule }}</span>
        </p>
    </div>
    <div class="text-center mt-2">
        @foreach ($job->tags as $tag)
            <x-tag href="/tags/{{ $tag->id }}">{{ $tag->name }}</x-tag>
        @endforeach

    </div>
    @can('view', $job->employer)
        <x-forms.form id="delete-job-{{ $job->id }}" method="DELETE" action="/jobs/{{ $job->id }}">
            <div class="mt-4 flex text-xs text-white">
                <div
                    class="bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition-colors duration-150 rounded-l p-1 w-12">
                    <a href="/jobs/{{ $job->id }}/edit" class="">Edit</a>
                </div>
                <x-forms.small-button type="submit" form="delete-job-{{ $job->id }}"
                    class="bg-red-700 hover:bg-red-900 dark:bg-red-900 dark:hover:bg-red-700  transition-colors duration-150 w-12 p-1 rounded-r">Delete
                </x-forms.small-button>
            </div>
        </x-forms.form>
    @endcan
</x-job-panel>
