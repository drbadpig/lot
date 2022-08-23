{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('dashboard') }}">--}}
{{--                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--                        {{ __('Dashboard') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Settings Dropdown -->--}}
{{--            <div class="hidden sm:flex sm:items-center sm:ml-6">--}}
{{--                <x-dropdown align="right" width="48">--}}
{{--                    <x-slot name="trigger">--}}
{{--                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">--}}
{{--                            <div>{{ Auth::user()->name }}</div>--}}

{{--                            <div class="ml-1">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </button>--}}
{{--                    </x-slot>--}}

{{--                    <x-slot name="content">--}}
{{--                        <!-- Authentication -->--}}
{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}

{{--                            <x-dropdown-link :href="route('logout')"--}}
{{--                                    onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                {{ __('Log Out') }}--}}
{{--                            </x-dropdown-link>--}}
{{--                        </form>--}}
{{--                    </x-slot>--}}
{{--                </x-dropdown>--}}
{{--            </div>--}}

{{--            <!-- Hamburger -->--}}
{{--            <div class="-mr-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--            <div class="px-4">--}}
{{--                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav
    class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 border-b border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 lg:px-8 lg:border-0 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                <a href="{{ route('home') }}" class="flex-none overflow-hidden w-auto">
                    <span class="sr-only">leagueoftalks home page</span>
                    <x-application-text-logo class="fill-text hover:fill-active"/>
                </a>

                <a href="https://www.leagueoflegends.com/" target="_blank" class="ml-6">
                    <img class="max-h-[25px]" src="lol_logo.png" alt="lol logo">
                </a>


                <div class="relative hidden lg:flex items-center ml-auto">
                    <nav class="text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200">
                        <ul class="flex space-x-8">
                            <li>
                                <a class="hover:text-active" href="#">Категории</a>
                            </li>
                            <li>
                                <a class="hover:text-active" href="#">Обсуждения</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="flex items-center border-l border-slate-200 ml-6 dark:border-slate-400">

                        @if (Auth::check())
                            <a href="{{ route('user', ['id' => Auth::user()->id]) }}"
                               class="ml-6 block text-slate-400 hover:text-slate-500 dark:hover:text-slate-300">
                                <span class="sr-only">Profile</span>
                                <x-icons.profile-icon class="h-6 w-6"/>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="ml-6 block text-slate-400 hover:text-slate-500 dark:hover:text-slate-300">
                                <span class="sr-only">Profile</span>
                                <x-icons.profile-icon class="h-6 w-6"/>
                            </a>
                        @endif


                        @unless (!Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="ml-6 block text-slate-400 hover:text-slate-500 dark:hover:text-slate-300">
                                    <span class="sr-only">Выйти</span>
                                    <x-icons.logout-icon class="h-6 w-6"/>
                                </a>
                            </form>
                        @endunless

                    </div>
                </div>
                <div class="ml-auto -my-1 lg:hidden">
                    <button type="button"
                            class="text-slate-500 w-8 h-8 flex items-center justify-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                        <span class="sr-only">Navigation</span>
                        <svg width="24" height="24" fill="none" aria-hidden="true">
                            <path
                                d="M12 6v.01M12 12v.01M12 18v.01M12 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
