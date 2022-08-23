<x-app-layout title="{{ $user->username }}">
    <!-- Title -->
    <h1 class="hidden">Профиль {{  $user->username }}</h1>

    <!-- Background image -->
    <div class="fixed top-0 right-0 left-0 bottom-0 opacity-40 blur-md bg-cover bg-center bg-no-repeat"
         style="background-image: url('../backgrounds/bg-serapgine-ocean.jpg')">
    </div>

    <!-- Settings buttons -->
    @if (Auth::user()->id == $user->id)
        <button type="button"
                class="absolute top-20 right-4 z-30 text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 p-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95"
        >
            <x-icons.adjustments-icon class="h-6 w-6"/>
        </button>

        <a href="{{ route('settings') }}"
                class="absolute top-40 right-4 z-30 text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 p-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95"
        >
            <x-icons.cog-icon class="h-6 w-6"/>
        </a>
    @endif

    <div class="container mx-auto p-8 flex flex-row relative z-10">

        <div class="basis-1/4">
            <img class="w-full mb-2 rounded-lg" src="avatar.png" alt="PHOTO">

            <span class="text-slate-400">Был в сети: сегодня</span>

            <a href="#" class="text-lg mb-1 mt-8 flex w-full hover:text-active">
                <span class="">Обсуждения</span>
                <span class="text-active ml-auto">{{ thousands_format(count($user->talks)) }}</span>
            </a>

            <a href="#" class="text-lg flex w-full hover:text-active">
                <span class="">Комментарии</span>
                <span class="text-active ml-auto">{{ thousands_format(count($user->comments)) }}</span>
            </a>
        </div>

        <div class="basis-3/4 ml-12 border-l pl-12 border-slate-900/10 dark:border-slate-50/[0.06]">
            <h1 class="text-3xl mb-6">{{ $user->username }}</h1>
            <div class="w-96 mb-6">
                <div class="w-full flex mb-1">
                    <span>На сайте с</span>
                    <span class="ml-auto">{{ date_format_my($user->created_at->toDateString()) }}</span>
                </div>
                <div class="w-full flex mb-1">
                    <span>Посещений</span>
                    <span class="ml-auto">{{ 'ERROR' }}</span>
                </div>
                <div class="w-full flex mb-1">
                    <span>Роли</span>
                    <span class="ml-auto">{{ $user->role->name }}</span>
                </div>
            </div>
            <span>Игровой ранг: Золото</span>
            <img class="w-auto mb-6" src="gold.png" alt="rank">
            <h2 class="text-xl">Достижения</h2>
            <div
                class="w-full p-3 mt-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 flex flex-row flex-wrap">
                @foreach ($user->achievements as $achievement)
                    <img class="w-28 h-28" src="{{ $achievement->image }}" title="{{ $achievement->name }}"
                         alt="{{ $achievement->name }}">
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
