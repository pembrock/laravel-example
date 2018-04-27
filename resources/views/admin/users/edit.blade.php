@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Редактировать товар</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p><input type="checkbox" name="isAdmin" value="1" @if ($user->isAdmin == 1)checked @endif autofocus> админ</p>
            <p>Email:<br><input type="text" name="email" class="form-control" value="{{ $user->email }}"></p>
            <p>Пароль:<br><input type="password" name="password" class="form-control" value=""></p>

            <button type="submit" class="btn btn-success">Редактировать</button>
            <br>
            <br>
        </form>
    </main>
@stop