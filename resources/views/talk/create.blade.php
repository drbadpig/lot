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
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['paragraph']],
                    ['fontsize', ['fontsize']],
                    ['insert', ['link', 'picture', 'video']],
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
        });
    </script>
</x-app-layout>
