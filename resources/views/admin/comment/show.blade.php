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
            @if ($comment->user != null)
                <td><a href="{{ route('admin.user.show', [$comment->user->id]) }}">{{ $comment->user->username }}</a>
                </td>
            @else
                <td><span>Пользователь удалён</span></td>
            @endif
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Тема</span>
        </div>
        <div class="col-sm-9">
            @if ($comment->talk != null)
                <a href="{{ route('admin.talk.show', $comment->talk->id) }}">{{ $comment->talk->title }}</a>
            @else
                <td><span>Тема удалена</span></td>
            @endif
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
    @if($comment->deleted_at == null)
        <form method="post" action="{{ route('admin.comment.destroy', [$comment->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
    @else
        <div class="row mt-3 text-lg">
            <div class="col-sm-3">
                <span>Дата удаления</span>
            </div>
            <div class="col-sm-9">
                {{ $comment->deleted_at }}
            </div>
        </div>
    @endif
</x-admin-layout>
