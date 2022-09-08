<x-app-layout title="Обсуждение">
    <x-banner/>

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks Новости</h1>
        <div class="mb-6">
            <a href="{{ route('home') }}">Главная</a> > <a href="/talk">Новости</a> > <a class="text-active" href="#">Legue
                Of Legegnds</a>
        </div>

        <div class="w-full">

            <div class="w-8/12">
                <div class="mb-12">
                    <h2 class="text-3xl uppercase mb-6">Новости League Of Legends</h2>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <x-icons.clip-icon class="h-4 w-4 absolute top-2 right-2 text-active"/>
                        <div class="w-96">
                            <a href="/talk" class="text-lg hover:text-active">Волибира удаляют из игры
                                :(</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>65</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>7.5k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <x-icons.clip-icon class="h-4 w-4 absolute top-2 right-2 text-active"/>
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Люкс получила очередной никому не нужный скин!</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>121</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>3.2k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('oval.jpg') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('oval.jpg') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('oval.jpg') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>490</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1.3k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>130</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>1k</span> <br>просмотров</span>
                        </div>
                    </div>
                    <div
                        class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="w-96">
                            <a href="/category/news-lol" class="text-lg hover:text-active">Всем привет! Я Новость :)</a>
                        </div>
                        <div class="flex">
                            <div class="flex mx-3">
                                <a href="/user/1">
                                    <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}" alt="ss">
                                </a>
                                <div class="flex flex-col ml-3">
                                    <a href="/user/1" class="font-semibold hover:text-activeLight">Username</a>
                                    <span>Автор</span>
                                </div>
                            </div>
                            <span class="text-center mx-3"><span>50</span> <br>комментариев</span>
                            <span class="text-center mx-3"><span>2.6k</span> <br>просмотров</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
