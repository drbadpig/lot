<x-admin-layout title="Редактировать">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редактировать пользователя</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{ route('admin.user.update', [$user->id]) }}">
            @csrf
            <div class="card-body">
                <x-auth-validation-errors class="mb-3"/>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $user->username }}">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option @if($role->id == $user->role_id) selected @endif value="{{ $role->id }}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</x-admin-layout>
