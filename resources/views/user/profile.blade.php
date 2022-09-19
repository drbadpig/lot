<x-app-layout title="{{ $user->username }}">
    <!-- Title -->
    <h1 class="hidden">Профиль {{  $user->username }}</h1>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its
                        citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25
                        and is meant to ensure a common set of data rights in the European Union. It requires
                        organizations to notify users as soon as possible of high-risk data breaches that could
                        personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="defaultModal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        I accept
                    </button>
                    <button data-modal-toggle="defaultModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Decline
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Background image -->
    <div class="fixed top-0 right-0 left-0 bottom-0 opacity-40 blur-md bg-cover bg-center bg-no-repeat"
         style="background-image: url('../backgrounds/bg-serapgine-ocean.jpg')">
    </div>

    <!-- Settings buttons -->
    @if (Auth::user()->id == $user->id)
        <button type="button" data-modal-toggle="defaultModal"
                class="absolute top-20 right-4 z-30 text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 p-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95"
        >
            <x-heroicon-o-adjustments-vertical class="w-6 h-6"/>
        </button>

        <a href="{{ route('settings') }}"
           class="absolute top-40 right-4 z-30 text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 p-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95"
        >
            <x-heroicon-o-cog-8-tooth class="h-6 w-6"/>
        </a>
    @endif

    <div class="container mx-auto p-8 flex flex-row relative z-10">

        <div class="basis-1/4">
            <img class="w-full mb-2 rounded-lg" src="{{asset($user->image)}}" alt="PHOTO">

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
