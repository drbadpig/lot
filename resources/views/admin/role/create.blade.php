<x-admin-layout title="Добавить">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавить роль</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{ route('admin.role.store') }}">
            @csrf
            <div class="card-body">
                <x-auth-validation-errors class="mb-3"/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>
</x-admin-layout>
