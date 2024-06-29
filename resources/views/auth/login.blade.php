<x-layout>
    <x-page-heading>Login</x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <div class="flex">
            <x-forms.checkbox label="Remember me" name="remember" :wrap="false" />
            <a href="/forgot-password" class="hover:underline">Forgot your password?</a>
        </div>
        <x-forms.button>Login</x-forms.button>
    </x-forms.form>
</x-layout>
