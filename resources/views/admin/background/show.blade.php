<x-admin-layout title="Фон профиля">
    @if($background->id == 1)
        <p class="mt-3 text-lg">Этот фон нельзя редактировать</p>
    @else
        <a href="{{ route('admin.background.edit', [$background->id]) }}" class="btn btn-primary">Редактировать</a>
    @endif
    <img alt="{{ $background->name }}" src="{{ asset($background->path) }}" width="600px" class="mt-3">
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $background->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Имя</span>
        </div>
        <div class="col-sm-9">
            {{ $background->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Путь</span>
        </div>
        <div class="col-sm-9">
            {{ $background->path }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $background->created_at }}
        </div>
    </div>
    @if($background->id == 1)
        <p class="mt-3 text-lg">Этот фон нельзя удалить</p>
    @else
        <form method="post" action="{{ route('admin.background.destroy', [$background->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
    @endif
</x-admin-layout>
