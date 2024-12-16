<x-layout>
    <x-page-heading>Password reset</x-page-heading>

    <x-forms.form method="POST" action="{{ url('/reset-password') }}">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Confirm password" name="password_confirmation" type="password" />
        <input type="hidden" name="token" value="{{ $token }}" />
        <x-forms.button>Reset password</x-forms.button>
    </x-forms.form>
</x-layout>
