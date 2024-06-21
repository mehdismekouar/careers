<x-layout>
    <x-page-heading>Results</x-page-heading>

    <div class="flex flex-wrap justify-center content-start items-stretch gap-6">
        @if (count($jobs))
        @foreach ($jobs as $job)
            <x-job-card :$job featured="{{ $job->featured }}" />
        @endforeach
        <div class="pt-5">
            {{ $jobs->links() }}
        </div>
        @else
            <p class="text-center text-xl">No results found for your search</p>
        @endif
    </div>
</x-layout>
