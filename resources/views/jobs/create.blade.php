<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="./jobs">
        <x-forms.input label="Title" name="title" placeholder="" />
        <x-forms.input label="Salary (in USD)" name="salary" placeholder="" />
        <x-forms.input label="Location" name="location" placeholder="" />

        <x-forms.select label="Schedule" name="schedule">
            <option value=""></option>
            <option @if (old('schedule') == 'Part time') selected @endif value="Part time">Part time</option>
            <option @if (old('schedule') == 'Full time') selected @endif value="Full time">Full time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="" />
        <x-forms.checkbox label="Featured" name="featured" placeholder="" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="" />
        <x-forms.button type="submit">Publish</x-forms.button>
    </x-forms.form>
</x-layout>
