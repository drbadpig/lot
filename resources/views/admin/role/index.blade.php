<x-admin-layout title="Роли">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица roles</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('admin.role.create') }}" class="btn btn-success mb-3">Создать</a>
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td><a href="{{ route('admin.role.show', [$role->id]) }}">{{ $role->name }}</a></td>
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
