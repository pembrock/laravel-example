@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Добавление галереи</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Введите название галереи:<br><input type="text" name="title" class="form-control"></p>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </main>
@stop