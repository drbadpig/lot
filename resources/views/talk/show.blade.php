<x-app-layout title="Обсуждение">
    <x-banner/>

    @php
        $like = \App\Models\Like::where('talk_id', $talk->id)->where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
    @endphp

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks обсуждение {{ $talk->id }}{{ $talk->title }}</h1>

        <div class="mb-6">
            <a href="{{ route('home') }}" class="hover:text-active">Главная</a> > <a
                href="{{ route('category', [$talk->category->id]) }}"
                class="hover:text-active">{{ $talk->category->name }}</a> >
            @if ($talk->user != null)
                <span>Обсуждение {{ $talk->user->username }}</span>
            @else
                <span>Обсуждение удалённого пользователя</span>
            @endif
        </div>

        <div class="w-full flex">

            <div class="w-8/12">
                <div class="mb-12">
                    <div
                        class="flex flex-col rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 mb-3">
                        <div class="border-b border-slate-50/[0.06] p-4">
                            <div class="flex justify-between">
                                <div class="flex">
                                    @if ($talk->user != null)
                                        <a href="{{ route('user', [$talk->user->id]) }}">
                                            <img class="min-w-12 min-h-12 w-12 h-12"
                                                 src="{{ asset($talk->user->image) }}"
                                                 alt="a">
                                        </a>
                                        <a href="{{ route('user', [$talk->user->id]) }}" class="ml-3">
                                            {{ $talk->user->username }}
                                        </a>
                                    @else
                                        <span>
                                            <img class="min-w-12 min-h-12 w-12 h-12"
                                                 src="{{ asset('images/no-image.jpg') }}"
                                                 alt="a">
                                        </span>
                                        <span class="ml-3">
                                            Пользователь удалён
                                        </span>
                                    @endif
                                </div>
                                <span
                                    class="font-medium text-sm">{{ date_format_tdmy($talk->created_at) }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-2xl uppercase mb-3">{{ $talk->title }}</h2>
                            {!! $talk->text !!}
                            <div class="flex justify-between mt-4">

                                <div class="flex items-center select-none">
                                    <x-heroicon-o-heart id="like-btn"
                                                        style="{{ $like != null ? 'display: none;' : '' }}"
                                                        class="h-6 w-6 text-red-600 mr-2 transition cursor-pointer"/>
                                    <x-heroicon-o-heart id="dislike-btn"
                                                        style="{{ $like == null ? 'display: none;' : '' }}"
                                                        class="h-6 w-6 text-red-600 mr-2 transition fill-red-600 cursor-pointer"/>
                                    <span id="likes" {{ $like != null ? 'data-like_id='.$like->id.'' : '' }}
                                    class="text-slate-400">{{ thousands_format(count($talk->likes)) }}</span>
                                </div>
                                <a href="#comment" class="flex items-center text-slate-400">
                                    <x-heroicon-o-arrow-uturn-left class="h-6 w-6 mr-2"/>
                                    <span>Ответить</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-2xl uppercase mb-3">Комментарии</h2>
                    <div id="comments">
                        @foreach($talk->comments as $comment)
                            <div
                                class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                                @if ($talk->user != null)
                                    <img src="{{ asset($comment->user->image) }}" class="h-16 w-16 mr-4" alt="sss">
                                @else
                                    <img src="{{ asset('images/no-image.jpg') }}" class="h-16 w-16 mr-4" alt="sss">
                                @endif
                                <div class="flex flex-col flex-auto">
                                    <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                        @if ($talk->user != null)
                                            <a class="text-lg" href="{{ route('user', [$comment->user->id]) }}">
                                                {{ $comment->user->username }}
                                            </a>
                                        @else
                                            <span class="text-lg">
                                                Пользователь удалён
                                            </span>
                                        @endif
                                        <span
                                            class="font-medium text-sm text-slate-400">{{ date_format_tdmy($comment->created_at) }}</span>
                                    </div>
                                    <div>
                                        <p>{!! $comment->text !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h2 class="text-xl uppercase mb-3">Добавить комментарий</h2>
                    <div id="comment"
                         class="flex flex-col rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <x-auth-validation-errors/>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <form class="w-full" method="post" action="{{ route('talk.comment', $talk->id) }}">
                                @csrf
                                <textarea id="summernote" name="editordata"></textarea>
                                <x-button id="comment-btn" class="mt-3 w-full justify-center">
                                    Ответить
                                </x-button>
                            </form>
                        @else
                            <a class="text-2xl text-slate-400" href="{{ route('login') }}">Войди в аккаунт, чтобы
                                оставить комментарий</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-1/12">
            </div>

            <div class="w-3/12">
                <div
                    class="relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                    <p>Категория: <a href="{{ route('category', $talk->category->id) }}"
                                     class="text-active hover:text-activeLight">{{ $talk->category->name }}</a></p>
                    <p class="mt-3">Просмотры: <span
                            class="text-active">{{ thousands_format(count($talk->talk_views)) }}</span>
                    </p>
                    <p class="mt-3">Комментарии: <span
                            class="text-active">{{ thousands_format(count($talk->comments)) }}</span>
                    </p>
                </div>
                <x-add-talk/>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Хочу добавить комментарий по этому поводу...',
                tabsize: 2,
                height: 150,
                minHeight: 150,
                maxHeight: 150,
                lang: 'ru-RU',
                dialogsInBody: true,
                shortcuts: false,
                focus: false,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['paragraph']],
                    ['fontsize', ['fontsize']],
                    ['insert', ['link']],
                ]
            });

            $('.note-editable').addClass('text-text bg-primaryDarker border-none');
            $('.note-toolbar').addClass('bg-primaryDarker border-b border-slate-50/[0.06]');
            $('.note-btn').addClass('bg-graphics border-slate-50/[0.06]');
            $('.note-btn i').addClass('text-text');
            $('.note-btn span').addClass('text-text');
            $('.note-editor.note-frame').addClass('border-slate-50/[0.06]');
            $('.note-modal-content').addClass('bg-primary');
            $('.note-modal-header').addClass('border-none text-text');
            $('.note-modal-title').addClass('text-text');
            $('.note-modal-body').addClass('overflow-auto scrollbar-thin scrollbar-thumb-graphics scrollbar-track-gray-100/0');
            $('.note-form-label').addClass('text-text');
            $('.note-icon-close').addClass('text-text');
            $('.note-input').addClass('border-gray-300 focus:ring focus:ring-active focus:ring-opacity-100 rounded-md shadow-sm text-slate-700');
            $('.checkbox').addClass('block mt-4');
            $('.checkbox label').addClass('inline-flex items-center');
            $('.checkbox label input').addClass('rounded border-none text-graphics shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mr-2');
            $('.note-modal-footer').addClass('h-auto pt-0 flex justify-end');
            $('.note-modal-footer .note-btn').addClass('inline-flex items-center px-4 py-2 bg-graphics border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-graphicsLight active:bg-graphics focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 float-none');

            $('#like-btn').on('click', function () {
                let talk_id = {{ $talk->id }};
                let user_id = {{ \Illuminate\Support\Facades\Auth::id() }};

                $.ajax({
                    url: '{{ route('talk.like') }}',
                    type: "POST",
                    data: {talk_id: talk_id, user_id: user_id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#likes').text(data['likes']).data('like_id', data['like_id']);
                        $('#like-btn').hide();
                        $('#dislike-btn').show();
                    },
                    error: function (msg) {

                    }
                });
            });

            $('#dislike-btn').on('click', function () {
                let like_id = $('#likes').data('like_id');

                $.ajax({
                    url: '{{ route('talk.dislike') }}',
                    type: "POST",
                    data: {like_id: like_id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#likes').text($('#likes').text() - 1);
                        $('#like-btn').show();
                        $('#dislike-btn').hide();
                    },
                    error: function (msg) {

                    }
                });
            });
        });
    </script>
</x-app-layout>
