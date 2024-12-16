<x-layout>
    <x-page-heading>Profile</x-page-heading>
    <x-forms.form method="PATCH" action="./employer/{{ $employer->id }}" enctype="multipart/form-data">
        <x-forms.input label="Your name" name="name" :value="$employer->user->name" />
        <x-forms.input label="Email" name="email" type="email" :value="$employer->user->email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Confirm password" name="password_confirmation" type="password" />
        <x-forms.divider />
        <x-forms.input label="Company name" name="employer" :value="$employer->name" />
        <div class="flex justify-stretch items-center">
            <x-employer-logo :image="basename($employer->logo)" size="100" class="mr-4" />
            <x-forms.input label="Company logo" name="logo" type="file" class="" />
        </div>
        <x-forms.button>Update account</x-forms.button>
    </x-forms.form>
</x-layout>
