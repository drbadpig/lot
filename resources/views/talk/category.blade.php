<x-app-layout title="Обсуждение">
    <x-banner/>

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks Новости</h1>
        <div class="mb-6">
            <a href="{{ route('home') }}">Главная</a> > <a href="/talk">Новости</a>
        </div>

        <div class="w-full">

            <div class="w-8/12">
                <div class="mb-12">
                    <h2 class="text-3xl uppercase mb-6">Новости и обновления</h2>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="flex-auto">
                            <a href="/category/news-lol" class="uppercase text-lg hover:text-active">Новости League Of Legends</a>
                            <p>Свежие новости по игре</p>
                        </div>
                        <span class="text-center mx-3"><span>490</span> <br>постов</span>
                        <span class="text-center mx-3"><span>1.3k</span> <br>комментариев</span>
                    </div>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <div class="flex-auto">
                            <a href="#" class="uppercase text-lg hover:text-active">Новости leagueoftalks</a>
                            <p>Новости по обновлению форума</p>
                        </div>
                        <span class="text-center mx-3"><span>490</span> <br>постов</span>
                        <span class="text-center mx-3"><span>1.3k</span> <br>комментариев</span>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
