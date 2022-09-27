<x-app-layout title="Главная">
    <x-banner/>
    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks forum</h1>

        <div class="w-full flex">
            <div class="w-8/12">
                @if(count($folders) == 0)
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <p>Здесь пусто. Но почему..?</p>
                    </div>
                @endif
                @foreach($folders as $folder)
                    <div class="mb-12">
                        <h2 class="text-3xl uppercase mb-6">{{ $folder->name }}</h2>
                        @if(count($folder->categories) == 0)
                            <div
                                class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                                <p>Папка есть, а категорий нет. Во прикол!</p>
                            </div>
                        @endif
                        @foreach($folder->categories as $category)
                            <div
                                class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                                <a href="{{ route('category', [$category->id]) }}" class="h-12 w-12 mr-3">
                                    {!! $category->image !!}
                                </a>
                                <div class="flex-auto">
                                    <a href="{{ route('category', [$category->id]) }}"
                                       class="uppercase text-lg hover:text-active">{{ $category->name }}</a>
                                    <p>{{ $category->description }}</p>
                                </div>
                                <div class="flex flex-col items-end justify-end text-slate-400">
                                    <div class="flex items-center" title="Посты">
                                        <span
                                            class="text-center mr-2">{{ thousands_format(count($category->talks)) }}</span>
                                        <x-heroicon-o-chat-bubble-bottom-center-text class="h-6 w-6"/>

                                    </div>
                                    <div class="flex items-center mt-1" title="Комментарии">
                                        <span
                                            class="text-center mr-2">{{ thousands_format(count($category->getComments())) }}</span>
                                        <x-heroicon-o-chat-bubble-oval-left class="h-6 w-6"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="w-1/12">
            </div>

            <div class="w-3/12">
                <x-add-talk/>
            </div>
        </div>

    </div>
</x-app-layout>
