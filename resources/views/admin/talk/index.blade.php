<x-admin-layout title="Talks">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица talks</h3>
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
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Создатель</th>
                                    <th>Лайки</th>
                                    <th>Просмотры</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($talks as $talk)
                                    <tr>
                                        <td>{{ $talk->id }}</td>
                                        <td><a href="{{ route('admin.talk.show', [$talk->id]) }}">{{ $talk->title }}</a></td>
                                        <td><a href="{{ route('admin.category.show', [$talk->category->id]) }}">{{ $talk->category->name }}</a></td>
                                        <td><a href="{{ route('admin.user.show', [$talk->user->id]) }}">{{ $talk->user->username }}</a></td>
                                        <td>{{ thousands_format(count($talk->comments)) }}</td>
                                        <td>{{ thousands_format(count($talk->talk_views)) }}</td>
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
