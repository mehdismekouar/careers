<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PATCH" action="/jobs/{{ $job->id }}">
        <x-forms.input label="Title" name="title" placeholder="" :value="$job->title" />
        <x-forms.input label="Salary (in USD)" name="salary" placeholder="" :value="$job->salary" />
        <x-forms.input label="Location" name="location" placeholder="" :value="$job->location" />

        <x-forms.select label="Schedule" name="schedule">
            <option value=""></option>
            <option @if (old('schedule', $job->schedule) == 'Part time') selected @endif value="Part time">Part time</option>
            <option @if (old('schedule', $job->schedule) == 'Full time') selected @endif value="Full time">Full time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="" :value="$job->url" />

        <x-forms.checkbox label="Featured" name="featured" placeholder="" :value="$job->featured" />
        <x-forms.divider />

        <x-forms.input label="Tags" name="tags" placeholder="" :value="$tags" />
        <x-forms.button type="submit">Update</x-forms.button>
    </x-forms.form>
</x-layout>
