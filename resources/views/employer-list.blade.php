<x-layout>
    <x-page-heading>{{ $title }}</x-page-heading>

    <div class="flex flex-wrap justify-center content-start items-stretch gap-6">
        @if (!count($employers))
            <p class="text-center text-xl">No results found for your search</p>
        @else
            @foreach ($employers as $employer)
                <x-employer-card :$employer />
            @endforeach
    </div>
    <div class="pt-5">
        {{ $employers->onEachSide(6)->links() }}
        @endif
    </div>
</x-layout>
