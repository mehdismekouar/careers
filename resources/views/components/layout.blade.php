<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.add('light');
        }
    </script>
    @vite(['resources/js/app.js'])
    <title>CAREERS</title>
</head>

<body class="dark:bg-black dark:text-white pt-4 pb-20 font-hanken">
    <x-forms.form id="logout" method="POST" action="/logout" class="hidden" />
    <div class="px-10" id="container">
        <nav class="flex items-center justify-between py-4 border-white/10">
            <a href="/" class="flex items-center font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                </svg>

                <span class="ml-1 mt-0.5 text-xl tracking-wider">CAREERS</span>
            </a>

            <!-- Desktop menu -->
            <div class="ml-2 inline-flex justify-end items-center gap-x-1 text-lg max-sm:hidden grow">
                @auth
                    @if (!Route::is('employer.profile') && !Auth::user()->is_admin)
                        <x-nav-link href="/employer/{{ Auth::user()->employer->id }}/edit">Profile</x-nav-link>
                    @elseif (!Route::is('employer.profile') && !Route::is('user.profile'))
                        <x-nav-link href="/user/{{ Auth::user()->id }}/edit">Profile</x-nav-link>
                    @endif
                    @if (!Route::is('employer.list') && Auth::user()->is_admin)
                        <x-nav-link href="/employers">Companies</x-nav-link>
                    @endif
                    @if (!Route::is('employer.jobs') && !Auth::user()->is_admin)
                        <x-nav-link href="/jobs/employer/{{ Auth::user()->employer->id }}">My jobs</x-nav-link>
                    @endif
                    @if (!Route::is('jobs.create') && !Auth::user()->is_admin)
                        <x-nav-link href="/jobs/create">New job</x-nav-link>
                    @endif
                    <x-forms.small-button class="hover:bg-gray-600 hover:text-white py-1 px-3 rounded-xl" :replace="true"
                        type="submit" form="logout">Logout</x-forms.button>
                    @endauth
                    @guest
                        @if (!Route::is('login'))
                            <x-nav-link href="/login">Login</x-nav-link>
                        @endif
                        @if (!Route::is('register'))
                            <x-nav-link href="/register">Register</x-nav-link>
                        @endif
                    @endguest
            </div>

            <!-- Mobile Menu (Hamburger Icon) -->
            <div class="max-sm:grow sm:hidden flex items-center justify-end py-1.5 ml-5" id="mobile-menu-toggle">
                <button id="menu-toggle" class="flex items-center cursor-pointer">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="menu w-6 h-6">
                        <path id="hamburger" fill-rule="evenodd"
                            d="M2 5a1 1 0 0 1 1-1h14a1 1 0 0 1 0 2H3a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 0 2H3a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 0 2H3a1 1 0 0 1-1-1z"
                            clip-rule="evenodd"></path>
                        <path id="cross" class="hidden" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Dark mode switch menu -->
            <div class="">
                <a class="rounded-full bg-gray-100 dark:bg-gray-700 p-1.5 flex items-center cursor-pointer ml-5"
                    id="switch">
                    <svg id="light" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="hidden size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                    <svg id="dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="hidden size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                </a>
            </div>
        </nav>
        <main class="mt-10 max-w-[1200px] mx-auto">{{ $slot }}</main>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed pointer-events-none inset-0 bg-black/50 z-9 opacity-0 transition-all duration-300">
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="sm:hidden pt-10 fixed flex flex-col h-screen top-0 left-[calc(-100vw+150px)] w-[calc(100vw-150px)] bg-gray-50 dark:bg-gray-900 z-10 space-y-1 transition-all duration-[250ms] text-lg"
        id="mobile-menu">
        @auth
            @if (!Route::is('employer.profile') && !Auth::user()->is_admin)
                <x-mobile-nav-link href="/employer/{{ Auth::user()->employer->id }}/edit">Profile</x-nav-link>
                @elseif (!Route::is('employer.profile'))
                    <x-mobile-nav-link href="/user/{{ Auth::user()->id }}/edit">Profile</x-nav-link>
            @endif
            @if (!Route::is('employer.list') && Auth::user()->is_admin)
                <x-mobile-nav-link href="/employers">Companies</x-nav-link>
            @endif
            @if (!Route::is('employer.jobs') && !Auth::user()->is_admin)
                <x-mobile-nav-link href="/jobs/employer/{{ Auth::user()->employer->id }}">My jobs</x-nav-link>
            @endif
            @if (!Route::is('jobs.create') && !Auth::user()->is_admin)
                <x-mobile-nav-link href="/jobs/create">New job</x-nav-link>
            @endif
            <x-forms.small-button class="hover:bg-gray-600 hover:text-white py-3 px-10 text-right w-full" :replace="true"
                type="submit" form="logout">Logout</x-forms.button>
            @endauth
            @guest
                @if (!Route::is('login'))
                    <x-mobile-nav-link href="/login">Login</x-mobile-nav-link>
                @endif
                @if (!Route::is('register'))
                    <x-mobile-nav-link href="/register">Register</x-mobile-nav-link>
                @endif

            @endguest
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div id="success-message" class="fixed w-full text-center top-10 opacity-0 transition-all duration-300">
            <span class="bg-green-200 dark:bg-green-800 py-3 px-4 rounded-xl align-middle">
                {{ session('success') }}
            </span>
        </div>
    @endif
</body>

</html>
