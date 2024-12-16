<x-layout>
    <x-page-heading>Profile</x-page-heading>
    <x-forms.form method="PATCH" action="./user/{{ $user->id }}">
        <x-forms.input label="Your name" name="name" :value="$user->name" />
        <x-forms.input label="Email" name="email" type="email" :value="$user->email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Confirm password" name="password_confirmation" type="password" />
        <x-forms.button>Update account</x-forms.button>
    </x-forms.form>
</x-layout>
