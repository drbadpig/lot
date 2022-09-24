<x-admin-layout title="Категория">
    <a href="{{ route('admin.category.edit', [$category->id]) }}" class="btn btn-primary">Редактировать</a>
    <div class="w-12 h-12 text-text mt-3">
        {!! $category->image !!}
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $category->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Название</span>
        </div>
        <div class="col-sm-9">
            {{ $category->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Описание</span>
        </div>
        <div class="col-sm-9">
            {{ $category->description }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Папка категории</span>
        </div>
        <div class="col-sm-9">
            {{ $category->category_folder->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $category->created_at }}
        </div>
    </div>

    <form method="post" action="{{ route('admin.category.destroy', [$category->id]) }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Удалить</button>
    </form>

</x-admin-layout>
