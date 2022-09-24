<x-admin-layout title="Папка категорий">
    <a href="{{ route('admin.folder.edit', [$folder->id]) }}" class="btn btn-primary">Редактировать</a>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $folder->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Название</span>
        </div>
        <div class="col-sm-9">
            {{ $folder->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $folder->created_at }}
        </div>
    </div>
    <form method="post" action="{{ route('admin.folder.destroy', [$folder->id]) }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Удалить</button>
    </form>
</x-admin-layout>
