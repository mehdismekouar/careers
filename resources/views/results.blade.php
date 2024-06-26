<x-layout>
    <x-page-heading>{{ $title }}</x-page-heading>

    <div class="flex flex-wrap justify-center content-start items-stretch gap-6">
        @if (!count($jobs))
            <p class="text-center text-xl">No results found for your search</p>
        @else
            @foreach ($jobs as $job)
                <x-job-card :$job featured="{{ $job->featured }}" />
            @endforeach
    </div>
    <div class="pt-5">
        {{ $jobs->onEachSide(6)->links() }}
        @endif
    </div>
</x-layout>
