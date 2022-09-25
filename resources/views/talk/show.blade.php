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
            <span>Обсуждение {{ $talk->user->username }}</span>
        </div>

        <div class="w-full flex">

            <div class="w-8/12">
                <div class="mb-12">
                    <div
                        class="flex flex-col rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 mb-3">
                        <div class="border-b border-slate-50/[0.06] p-4">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <a href="{{ route('user', [$talk->user->id]) }}">
                                        <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset($talk->user->image) }}"
                                             alt="a">
                                    </a>
                                    <a href="{{ route('user', [$talk->user->id]) }}" class="ml-3">
                                        {{ $talk->user->username }}
                                    </a>
                                </div>
                                <span
                                    class="font-medium text-sm">{{ date_format_my($talk->created_at->toDateString()) }}</span>
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
                    @foreach($talk->comments as $comment)
                        <div
                            class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                            <img src="{{ asset($comment->user->image) }}" class="h-16 w-16 mr-4" alt="sss">
                            <div class="flex flex-col flex-auto">
                                <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                    <a class="text-lg" href="{{ route('user', [$comment->user->id]) }}">
                                        {{ $comment->user->username }}
                                    </a>
                                    <span
                                        class="font-medium text-sm">{{ date_format_my($comment->created_at->toDateString()) }}</span>
                                </div>
                                <div>
                                    <p>{{ $comment->text }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <h2 class="text-xl uppercase mb-3">Добавить комментарий</h2>
                    <div id="comment"
                         class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">             @if(\Illuminate\Support\Facades\Auth::check())
                            <form class="w-full" method="post" action="{{ route('talk.store') }}">
                                @csrf
                                <textarea id="summernote" name="editordata"></textarea>
                                <x-button class="mt-3 w-full justify-center">
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
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['help']]
                ]
            });
        });

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
                    alert('Ошибка');
                }
            });
        });

        $('#dislike-btn').on('click', function () {
            console.log($('#likes').data('like_id'));
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
                    alert('Ошибка');
                }
            });
        });
    </script>
</x-app-layout>
