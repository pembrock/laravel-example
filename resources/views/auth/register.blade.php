
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    {!! csrf_field() !!}
    {{--<img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">--}}
    <h1 class="h3 mb-3 font-weight-normal">Пожалуйста зарегистрируйтесь</h1>
    <label for="inputEmail" class="sr-only">Email адресс</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
    <label for="inputPassword" class="sr-only">Повторите пароль</label>
    <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control" placeholder="Повторите пароль" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="1"> Запомнить
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>