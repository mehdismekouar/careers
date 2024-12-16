<x-layout>
    <x-page-heading>{{ $title }}</x-page-heading>

    @if (!count($employers))
    <div class="text-center text-xl p-6">No results found for your search</div>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($employers as $employer)
                <x-employer-card :$employer />
            @endforeach
    </div>
    <div class="pt-5">
        {{ $employers->onEachSide(6)->links() }}
        @endif
    </div>
</x-layout>
