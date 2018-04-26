@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Добавление товара в магазин</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Введите заголовок:<br><input type="text" name="title" class="form-control"></p>
            <p>Описание:<br><textarea name="description" class="form-control summernote"></textarea></p>
            <p>Цена:<br><input type="text" name="price" class="form-control" value="0" placeholder="Введи цену"></p>
            <p>Изображение:<br><input type="file" name="image"/></p>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </main>
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 250
            });
            $('.popover').hide();
        });
    </script>
@stop