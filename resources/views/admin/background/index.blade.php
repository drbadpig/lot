<x-admin-layout title="Фоны профиля">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица background_images</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('admin.background.create') }}" class="btn btn-success mb-3">Создать</a>
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Путь</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($backgrounds as $background)
                                    <tr>
                                        <td>{{ $background->id }}</td>
                                        <td><a href="{{ route('admin.background.show', [$background->id]) }}">{{ $background->name }}</a></td>
                                        <td>{{ $background->path }}</td>
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
