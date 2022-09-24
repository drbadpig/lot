<x-admin-layout title="Категории">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-3">Создать</a>
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Папка категории</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a href="{{ route('admin.category.show', [$category->id]) }}">{{ $category->name }}</a></td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->category_folder->name }}</td>
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
