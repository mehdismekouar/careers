<x-layout>
    <div class="space-y-10">
        @if (count($jobs) || count($featured))
            <section class="text-center">
                <h1 class="text-4xl mt-10 mb-6">Search Jobs</h1>
                <x-forms.form action="/search">
                    <div class="relative">
                        <x-forms.input :label="false" name="search" placeholder="Search..." class="" />
                        <x-forms.small-button type="submit" class="absolute top-4 right-4 bg-transparent p-0 m-0"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-forms.small-button>
                    </div>
                </x-forms.form>
            </section>
            @if (count($featured))
                <section class="space-y-2 pt-10">
                    <x-section-heading>Featured Jobs</x-section-heading>
                    <div class="flex flex-wrap justify-center content-start items-stretch gap-6">
                        @foreach ($featured as $job)
                            <x-job-card :$job />
                        @endforeach
                    </div>
                </section>
            @endif
            @if (count($tags))
                <section class="space-y-2">
                    <x-section-heading>Tags</x-section-heading>
                    <div class="space-x-1">
                        @foreach ($tags as $tag)
                            <x-tag href="/tags/{{ $tag->name }}">{{ $tag->name }}</x-tag>
                        @endforeach
                    </div>
                </section>
            @endif
            @if (count($jobs))
                <section class="space-y-2">
                    <x-section-heading>Recent Jobs</x-section-heading>
                    <div class="flex flex-wrap justify-center content-start items-stretch gap-6">
                        @foreach ($jobs as $job)
                            <x-job-card :$job />
                        @endforeach
                    </div>
                    <div class="pt-5">
                        {{ $jobs->onEachSide(6)->links() }}
                    </div>
                </section>
            @endif
        @else
            <section class="h-[calc(100vh-250px)] flex justify-center items-center">
                No job listings available
            </section>
        @endif
    </div>
</x-layout>
