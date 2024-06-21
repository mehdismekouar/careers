@props(['job', 'featured' => false])

<x-panel
    class="relative flex-grow-0 flex-shrink-0 w-full sm:w-[calc(50%-.75rem)] lg:w-[calc(33.33%-1rem)] min-h-[250px]">
    @if ($featured)
        <span class="absolute rounded-xl w-3 h-3 -top-1 -right-1 bg-blue-600"></span>
    @endif
    <div class="text-sm text-gray-400 flex justify-between gap-x-2">
        <span>{{ $job->employer->name }}</span>
        <x-employer-logo :image="basename($job->employer->logo)" />
    </div>
    <div class="font-bold">
        <a href="{{ $job->url }}" target="_blank">
            <h3 class="text-lg group-hover:text-blue-600 transition duration-300">{{ $job->title }}</h3>
        </a>
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
            <x-tag href="/tags/{{ $tag->name }}">{{ $tag->name }}</x-tag>
        @endforeach

    </div>
    @can('view', $job->employer)
        <x-forms.form id="delete-job-{{ $job->id }}" method="DELETE" action="/jobs/{{ $job->id }}">
            <div class="mt-4 flex text-2xs">
                <div class="bg-gray-600 hover:bg-gray-500 transition-colors duration-300 rounded-l p-1 w-12">
                    <a href="/jobs/{{ $job->id }}/edit" class="">Edit</a>
                </div>
                <x-forms.small-button type="submit" form="delete-job-{{ $job->id }}"
                    class="bg-red-900 hover:bg-red-700  transition-colors duration-300 w-12 p-1 rounded-r">Delete
                </x-forms.small-button>
            </div>
        </x-forms.form>
    @endcan
</x-panel>
