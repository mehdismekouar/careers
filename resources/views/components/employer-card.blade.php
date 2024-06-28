@props(['employer'])

<x-employer-panel
    class="relative flex-grow-0 flex-shrink-0 w-full sm:w-[calc(100%)] md:w-[calc(50%-0.75rem)] lg:w-[calc(33.33%-1rem)] min-h-[250px] items-center ">
    <x-employer-logo :image="basename($employer->logo)" size="50" class="mt-4" />
    <div>
        <p class="font-bold text-lg">{{ $employer->name }}</p>
        <p class="text-gray-500 text-sm">{{ $employer->user->name }} <a href="mailto:{{ $employer->user->email }}"
                class="font-bold">{{ $employer->user->email }}</strong></p>
    </div>

    <div>
        @if (!$employer->jobs_count)
            <p class="text-gray-500">No job listings</p>
        @else
            <a href="/jobs/employer/{{ $employer->id }}"
                class="text-gray-500 group-hover:text-blue-600 hover:underline transition duration-150 text-xl font-bold">{{ $employer->jobs_count }}
                job
                listing{{ $employer->jobs_count > 1 ? 's' : '' }}
            </a>
        @endif
    </div>

    <x-forms.form id="delete-employer-{{ $employer->id }}" method="DELETE" action="/employer/{{ $employer->id }}">
        <div class="mt-4 flex text-xs text-white">
            <div
                class="bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition-colors duration-150 rounded-l p-1 w-12">
                <a href="/employer/{{ $employer->id }}/edit" class="">Edit</a>
            </div>
            <x-forms.small-button type="submit" form="delete-employer-{{ $employer->id }}"
                class="bg-red-700 hover:bg-red-900 dark:bg-red-900 dark:hover:bg-red-700  transition-colors duration-150 w-12 p-1 rounded-r">Delete
            </x-forms.small-button>
        </div>
    </x-forms.form>
    </x-job-panel>
