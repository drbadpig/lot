<x-admin-layout title="Редактировать">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редактировать категорию</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{ route('admin.category.update', [$category->id]) }}">
            @csrf
            <div class="card-body">
                <x-auth-validation-errors class="mb-3"/>
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Описание" value="{{ $category->description }}">
                </div>
                <div class="form-group">
                    <label for="image">SVG тег картинка</label>
                    <textarea  class="form-control" id="image" name="image" placeholder="<svg></svg>">
                        {{ $category->image }}
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="folder">Папка категорий</label>
                            <select id="folder" name="folder" class="form-control">
                                @foreach($folders as $folder)
                                    <option @if($folder->id == $category->category_folder_id) selected @endif value="{{ $folder->id }}">{{$folder->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>

    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
</x-admin-layout>
