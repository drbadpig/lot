<x-admin-layout title="Пользователь">
    <a href="{{ route('admin.user.edit', [$user]) }}" class="btn btn-primary">Редактировать</a>
    <img alt="{{ $user->username }}" src="{{ asset($user->image) }}" width="300px" class="mt-3">
    <form method="post" action="{{ route('admin.user.photo', [$user->id]) }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Удалить фото</button>
    </form>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>ID</span>
        </div>
        <div class="col-sm-9">
            {{ $user->id }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Логин</span>
        </div>
        <div class="col-sm-9">
            {{ $user->username }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Email</span>
        </div>
        <div class="col-sm-9">
            {{ $user->email }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Email подтверждена</span>
        </div>
        <div class="col-sm-9">
            {{ $user->email_verified_at }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Роль</span>
        </div>
        <div class="col-sm-9">
            {{ $user->role->name }}
        </div>
    </div>
    <div class="row mt-3 text-lg">
        <div class="col-sm-3">
            <span>Регистрация</span>
        </div>
        <div class="col-sm-9">
            {{ $user->created_at }}
        </div>
    </div>
    <button class="btn btn-danger mt-3">Удалить</button>
</x-admin-layout>
