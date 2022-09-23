<x-admin-layout title="Пользователь">
    <a href="#" class="btn btn-primary">Редактировать</a>
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
    <form>
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Удалить</button>
    </form>
</x-admin-layout>
