<x-admin-layout title="Папки категорий">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица category_folders</h3>
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
                                    <th>Название</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($folders as $folder)
                                    <tr>
                                        <td>{{ $folder->id }}</td>
                                        <td><a href="{{ route('admin.folder.show', [$folder->id]) }}">{{ $folder->name }}</a></td>
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
