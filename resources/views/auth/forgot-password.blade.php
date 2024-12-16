<x-layout>
    <x-page-heading>Password forgotten</x-page-heading>

    <x-forms.form method="POST" action="{{ url('/forgot-password') }}">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.button>Send link</x-forms.button>
    </x-forms.form>
</x-layout>
