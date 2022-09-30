<x-admin-layout title="Talk">
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $talk->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Название</span>
        </div>
        <div class="col-sm-9">
            {{ $talk->title }}
        </div>
    </div>
    @if($talk->deleted_at == null)
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Содержимое</span>
        </div>
        <div class="col-sm-9">
            <a class="underline" href="{{ route('talk.show', $talk->id) }}">Посмотреть на сайте</a>
        </div>
    </div>
    @endif
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Категория</span>
        </div>
        <div class="col-sm-9">
            {{ $talk->category->id }}
        </div>
    </div>
    @if ($talk->user != null)
        <div class="row mt-3 text-lg">
            <div class="col-sm-3">
                <span>Создатель</span>
            </div>
            <div class="col-sm-9">
                {{ $talk->user->username }}
            </div>
        </div>
    @else
        <div class="row mt-3 text-lg">
            <div class="col-sm-3">
                <span>Создатель</span>
            </div>
            <div class="col-sm-9">
                Пользователь удалён
            </div>
        </div>
    @endif

    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Лайки</span>
        </div>
        <div class="col-sm-9">
            {{ thousands_format(count($talk->comments)) }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Просмотры</span>
        </div>
        <div class="col-sm-9">
            {{ thousands_format(count($talk->talk_views)) }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $talk->created_at }}
        </div>
    </div>
    @if($talk->deleted_at == null)
        <form method="post" action="{{ route('admin.talk.destroy', [$talk->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
    @else
        <div class="row mt-3 text-lg">
            <div class="col-sm-3">
                <span>Дата удаления</span>
            </div>
            <div class="col-sm-9">
                {{ $talk->deleted_at }}
            </div>
        </div>
    @endif
</x-admin-layout>
