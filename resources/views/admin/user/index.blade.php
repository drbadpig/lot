<x-admin-layout title="Пользователи">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('admin.user.show', [$user->id]) }}">{{ $user->username }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
</x-admin-layout>
