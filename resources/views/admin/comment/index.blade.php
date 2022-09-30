<x-admin-layout title="Комментарии">

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Таблица comments</h3>
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
                                    <th>Тема</th>
                                    <th>Отправитель</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        @if ($comment->talk != null)
                                            <td><a href="{{ route('admin.comment.show', [$comment->id]) }}">{{ $comment->talk->title }}</a></td>
                                        @else
                                            <td><a href="{{ route('admin.comment.show', [$comment->id]) }}">Тема удалена</a></td>
                                        @endif
                                        @if ($comment->user != null)
                                            <td><a href="{{ route('admin.user.show', [$comment->user->id]) }}">{{ $comment->user->username }}</a></td>
                                        @else
                                            <td><span>Пользователь удалён</span></td>
                                        @endif
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
