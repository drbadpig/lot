<x-app-layout title="Создать обсуждение">
    <x-banner/>

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks создать обсуждение</h1>

        <div
            class="relative rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
            <form class="w-full" method="post" action="{{ route('talk.store') }}">
                @csrf
                <x-auth-validation-errors/>
                <div class="w-12/12 flex flex-wrap">
                    <div class="w-full mb-3">
                        <label class="block text-text text-lg mb-2" for="title">
                            Заголовок
                        </label>
                        <x-input class="w-full" id="title" type="text" name="title" placeholder="Люкс получила очередной никому не нужный скин"/>
                    </div>
                    <div class="w-full mb-3">
                        <label class="block text-text text-lg mb-2" for="category">
                            Категория
                        </label>
                        <select class="w-full rounded-md shadow-sm text-slate-700" id="category" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <textarea id="summernote" name="editordata"></textarea>
                <x-button class="mt-3 w-full justify-center">
                    Обсудить
                </x-button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Нужен ли Люкс очередной скин? Вопрос не требует ответа. Всем и так всё ясно. Но знаете что...',
                tabsize: 2,
                height: 500,
                minHeight: 300,
                lang: 'ru-RU',
                dialogsInBody: true,
                shortcuts: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });

            $('#summernote').summernote('foreColor', 'white');
        });
    </script>
</x-app-layout>
