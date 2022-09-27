<x-app-layout title="{{ $user->username }}">
    <!-- Title -->
    <h1 class="hidden">Профиль {{ $user->username }}</h1>

    <div id="modal-bg-customs" class="relative z-40" aria-labelledby="modal-title" role="dialog" aria-modal="true"
         style="display: none;">
        <div class="fixed inset-0 bg-black/20 transition-opacity backdrop-blur"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div id="modal-bg-customs-panel"
                 class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-black text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-primary/90 backdrop-blur px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div id="images"
                             class="flex flex-wrap items-center justify-between max-h-[400px] overflow-y-auto scrollbar-thin scrollbar-thumb-graphics scrollbar-track-gray-100/0 pb-12">
                            @foreach($backgrounds as $background)
                                <img data-id="{{$background->id}}" class="w-[13.5rem] mb-5 mr-4 cursor-pointer"
                                     alt="{{$background->name}}" src="{{ asset($background->path) }}">
                            @endforeach
                        </div>
                        <div
                            class="border-slate-50/[0.06] absolute bottom-0 left-0 right-0 bg-black/20 backdrop-blur px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button id="btn-accept" type="button"
                                    class="inline-flex mr-4 w-full justify-center rounded-md border border-transparent bg-active px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-activeLight focus:outline-none  sm:ml-3 sm:w-auto sm:text-sm">
                                Применить
                            </button>
                            <button id="btn-cancel" type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Отмена
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background image -->
    <div id="bg-image" class="fixed top-0 right-0 left-0 bottom-0 opacity-40 blur-md bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{asset($user->backgroundImage->path)}}')">
    </div>

    <!-- Settings buttons -->
    @auth
        @if (Auth::user()->id == $user->id)
            <button type="button" id="open-bg-customs" data-modal-toggle="defaultModal"
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
    @endauth

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
{{--                <div class="w-full flex mb-1">--}}
{{--                    <span>Посещений</span>--}}
{{--                    <span class="ml-auto">{{ 'ERROR' }}</span>--}}
{{--                </div>--}}
                <div class="w-full flex mb-1">
                    <span>Роли</span>
                    <span class="ml-auto">{{ $user->role->name }}</span>
                </div>
            </div>
{{--            <span>Игровой ранг: Золото</span>--}}
{{--            <img class="w-auto mb-6" src="gold.png" alt="rank">--}}
{{--            <h2 class="text-xl">Достижения</h2>--}}
{{--            <div--}}
{{--                class="w-full p-3 mt-4 rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 flex flex-row flex-wrap">--}}
{{--                @foreach ($user->achievements as $achievement)--}}
{{--                    <img class="w-28 h-28" src="{{ $achievement->image }}" title="{{ $achievement->name }}"--}}
{{--                         alt="{{ $achievement->name }}">--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>

    </div>

    <script>
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("modal-bg-customs");
        let modalPanel = document.getElementById("modal-bg-customs-panel");

        let btnOpen = document.getElementById("open-bg-customs");
        let btnCancel = document.getElementById("btn-cancel");
        let btnAccept = document.getElementById("btn-accept");

        let imagesParent = document.getElementById("images");

        btnOpen.onclick = function () {
            modal.style.display = "block";
        }
        btnCancel.onclick = function () {
            modal.style.display = "none";
        }
        // btnAccept.onclick = function() {
        //     modal.style.display = "none";
        // }

        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function (event) {
            if (event.target === modalPanel) {
                modal.style.display = "none";
            }
        }

        let selectedImage = 0;

        imagesParent.addEventListener('click', e => {
            if (e.target.tagName === 'IMG') {
                if (selectedImage !== 0) {
                    selectedImage.style.border = "none";
                }

                selectedImage = e.target;
                selectedImage.style.border = "2px solid #c79b3b";
            }
        })

        $('#btn-accept').on('click', function () {
            let id = selectedImage.dataset.id;
            console.log(id);

            $.ajax({
                url: '{!! route('user.background') !!}',
                type: "POST",
                data: {id: id},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    modal.style.display = "none";
                    $('#bg-image').css('background-image', 'url("' + data['path'] + '")');
                },
                error: function (msg) {
                }
            });
        });
    </script>
</x-app-layout>
