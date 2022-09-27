<x-admin-layout title="Комментарий">
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $comment->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Отправитель</span>
        </div>
        <div class="col-sm-9">
            {{ $talk->user->username }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Тема</span>
        </div>
        <div class="col-sm-9">
            <a>{{ $talk->talk->title }}</a>
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Содержимое</span>
        </div>
        <div class="col-sm-9">
            <p>{!! $comment->text !!}</p>
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $comment->created_at }}
        </div>
    </div>
    <form method="post" action="{{ route('admin.comment.destroy', [$comment->id]) }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Удалить</button>
    </form>
</x-admin-layout>
