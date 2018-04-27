@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Добавление пользователя</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p><input type="checkbox" name="isAdmin" value="1" class="form-check"> админ </p>
            <p>Email:<br><input type="text" name="email" class="form-control"></p>
            <p>Пароль:<br><input type="password" name="password" class="form-control"></p>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </main>
@stop