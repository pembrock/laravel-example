@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Добавление статьи</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Введите заголовок статьи:<br><input type="text" name="header" class="form-control"></p>
            <p>Описание:<br><textarea name="description" class="form-control"></textarea></p>
            <p>Текст:<br><textarea name="text" class="form-control"></textarea></p>
            <p>Изображение:<br><input type="file" name="image"/></p>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </main>
@stop