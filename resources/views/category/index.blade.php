<x-app-layout title="{{ $category->name }}">
    <x-banner/>

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks категория {{ $category->name }}</h1>
        <div class="mb-6">
            <a href="{{ route('home') }}" class="hover:text-active">Главная</a> > <a
                href="{{ route('category', [$category->id]) }}" class="hover:text-active">{{ $category->name }}</a>
        </div>

        <div class="w-full flex">

            <div class="w-8/12">
                <div class="mb-12">
                    <h2 class="text-3xl uppercase mb-6">{{ $category->name }}</h2>
                    @if(count($talks) == 0)
                        <div
                            class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                            <p>Здесь пусто :( но вы можете стать первым!</p>
                        </div>
                    @endif
                    @foreach($talks as $talk)
                        <div
                            class="flex relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                            <div class="w-full flex items-start justify-between">
                                <div class="w-6/12">
                                    <a href="{{ route('talk.show', [$talk->id]) }}"
                                       class="text-lg hover:text-active">{{ $talk->title }}</a>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="flex">
                                        <div class="flex flex-col items-end mr-3">
                                            @if ($talk->user != null)
                                                <a href="{{ route('user', [$talk->user->id]) }}"
                                                   class="font-semibold hover:text-activeLight text-right">{{ $talk->user->username }}</a>
                                            @else
                                                <span class="font-semibold text-right">Пользователь удалён</span>
                                            @endif
                                            <span>Автор</span>
                                        </div>
                                        @if ($talk->user != null)
                                            <a href="{{ route('user', [$talk->user->id]) }}">
                                                <img class="min-w-[3rem] min-h-[3rem] w-12 h-12"
                                                     src="{{ asset($talk->user->image) }}" alt="a">
                                            </a>
                                        @else
                                            <span>
                                                <img class="min-w-[3rem] min-h-[3rem] w-12 h-12"
                                                     src="{{ asset('images/no-image.jpg') }}" alt="a">
                                            </span>
                                        @endif
                                    </div>
                                    <div class="w-full flex items-center justify-end text-slate-400 mt-3">
                                        <div class="flex items-center mr-3">
                                            <span
                                                class="mr-2">{{ thousands_format(count($talk->comments)) }}</span>
                                            <x-heroicon-o-chat-bubble-oval-left class="h-6 w-6"/>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="mr-2">{{ thousands_format(count($talk->talk_views)) }}</span>
                                            <x-heroicon-o-eye class="h-6 w-6"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-1/12">
            </div>

            <div class="w-3/12">
                <x-add-talk/>
            </div>
        </div>
    </div>

</x-app-layout>
