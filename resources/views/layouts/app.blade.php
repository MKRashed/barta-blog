<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:pages" content="628755964259938" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/css/fontAwesome5Pro.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col justify-between font-sans text-gray-900 antialiased bg-gray-100 scrollbar overflow-y-scroll">
    <header>
        <!-- Navigation -->
        <nav
            x-data="{ mobileMenuOpen: false, userMenuOpen: false }"
            class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <div class="flex">
                        <div class="flex flex-shrink-0 items-center">
                            <a href="/">
                                <h2 class="font-bold text-2xl">Barta</h2>
                            </a>
                        </div>
                    </div>
                    <form action="" method="POST" class="flex items-center">
                        <input
                            type="text"
                            placeholder="Search..."
                            class="border-2 border-gray-300 bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" />
                    </form>
                    <div class="hidden sm:ml-6 sm:flex gap-2 sm:items-center">
                        <button
                            type="button"
                            class="text-gray-900 hover:text-white border-2 border-gray-800 hover:bg-gray-900 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hidden md:block">
                            Create Post
                        </button>

                        <div
                            class="relative ml-3"
                            x-data="{ open: false }">
                            <div>
                                <button
                                    @click="open = !open"
                                    type="button"
                                    class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                    id="user-menu-button"
                                    aria-expanded="false"
                                    aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="h-8 w-8 rounded-full"
                                        src="https://avatars.githubusercontent.com/u/49880340?s=400&u=6708342a4a46b7090039269faf8e3d812ac4ca86&v=4"
                                        alt="Rashedul Islam" />
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div
                                x-show="open"
                                @click.away="open = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a
                                    href="{{ route('admin') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a>
                                <a
                                    href="{{ route('profile.edit', auth()->user()->id) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-1">Edit Profile</a>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <!-- Mobile menu button -->
                        <button
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500"
                            aria-controls="mobile-menu"
                            aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Icon when menu is closed -->
                            <svg
                                x-show="!mobileMenuOpen"
                                class="block h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>

                            <!-- Icon when menu is open -->
                            <svg
                                x-show="mobileMenuOpen"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div
                x-show="mobileMenuOpen"
                class="sm:hidden"
                id="mobile-menu">
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="flex items-center px-4">
                        <div>
                            <div class="text-base font-medium text-gray-800">
                                {{ auth()->user()->first_name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a
                            href="{{ route('admin') }}"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Your Profile</a>
                        <a
                            href="{{ route('profile.edit', auth()->user()->id) }}"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Edit Profile</a>
                        <a
                            href="#"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="my-container py-4">
        {{ $slot }}
    </main>

    <footer class="shadow bg-black mt-10">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a
                    href="https://github.com/alnahian2003"
                    class="flex items-center mb-4 sm:mb-0">
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap text-white">Barta</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium sm:mb-0 text-gray-100">
                    <li>
                        <a
                            href="#"
                            class="mr-4 hover:underline md:mr-6">About</a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="mr-4 hover:underline md:mr-6">Licensing</a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
            <span class="block text-sm sm:text-center text-gray-200">© 2023
                <a
                    href="https://github.com/alnahian2003"
                    class="hover:underline">Barta</a>. All Rights Reserved.</span>
        </div>
    </footer>

</body>

</html>