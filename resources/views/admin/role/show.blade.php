<x-admin-layout title="Роль">
    <a href="{{ route('admin.role.edit', [$role->id]) }}" class="btn btn-primary">Редактировать</a>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $role->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Роль</span>
        </div>
        <div class="col-sm-9">
            {{ $role->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Дата создания</span>
        </div>
        <div class="col-sm-9">
            {{ $role->created_at }}
        </div>
    </div>
    @if($role->id == 1 || $role->id == 2)
        <p class="mt-3 text-lg">Эту роль нельзя удалить</p>
    @else
        <form method="post" action="{{ route('admin.role.destroy', [$role->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
    @endif
</x-admin-layout>
