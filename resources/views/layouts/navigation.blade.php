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
                    <img class="max-h-[25px]" src="{{ asset('lol_logo.png') }}" alt="lol logo">
                </a>


                <div class="relative hidden lg:flex items-center ml-auto">
                    <nav class="text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200">
                        <ul class="flex space-x-8">
                            <li>
                                <a class="hover:text-active" href="#">Добавить обсуждение</a>
                            </li>
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
                                <x-heroicon-o-user-circle class="h-6 w-6"/>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="ml-6 block text-slate-400 hover:text-slate-500 dark:hover:text-slate-300">
                                <span class="sr-only">Profile</span>
                                <x-heroicon-o-user-circle class="h-6 w-6"/>
                            </a>
                        @endif


                        @unless (!Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="ml-6 block text-slate-400 hover:text-slate-500 dark:hover:text-slate-300">
                                    <span class="sr-only">Выйти</span>
                                    <x-heroicon-o-arrow-left-on-rectangle class="h-6 w-6"/>
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
