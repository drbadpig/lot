<x-admin-layout title="Добавить">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавить фон</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{ route('admin.background.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <x-auth-validation-errors class="mb-3"/>
                <div class="form-group">
                    <label for="name">Название (без разрешения)</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Файл</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image"></label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>

    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
</x-admin-layout>
