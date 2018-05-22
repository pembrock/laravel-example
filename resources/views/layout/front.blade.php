<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Описание сайта">
    <meta name="author" content="">
    <link rel="icon" href="/app/img/favicon/favicon.ico">

    <title>Иконная лавка | Берег спасения</title>

    <link href="/app/css/bootstrap.min.css" rel="stylesheet">
    <link href="/app/css/styles.css" rel="stylesheet">

</head>
<body>


<!-- ================================================== -->
<!-- модальное окно покупки иконы начало -->
<div class="modal fade" id="modal-zakaz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказ иконы "Св. Дмитрий Донской"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="cc-name">Имя</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="Введите имя" required>
                        <div class="invalid-feedback">
                            Введите верное имя
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-phone">Телефон</label>
                        <input type="text" class="form-control" id="cc-phone" placeholder="Введите номер" required>
                        <div class="invalid-feedback">
                            Введите верный номер телефона
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-delivery">Способ доставки</label>
                        <div class="custom-control custom-radio" id="cc-delivery">
                            <input id="delivery-1" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="delivery-1">Самавывоз в <a href="https://yandex.ru/maps/-/CBqyeGHyGA" target="_blank">офисе</a> <span class="text-success">бесплатно</span></label>
                        </div>
                        <div class="custom-control custom-radio" id="cc-delivery">
                            <input id="delivery-2" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="delivery-2">Курьером в пределах Москвы <span class="text-success">+150 руб</span></label>
                        </div>
                        <div class="custom-control custom-radio" id="cc-delivery">
                            <input id="delivery-3" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="delivery-3">Транспортной компанией за пределы Москвы (оплачивается отдельно)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary">Заказать</button>
            </div>
        </form>
    </div>
</div>
<!-- модальное окно покупки иконы конец -->
<!-- ================================================== -->

<!-- ================================================== -->
<!-- заголовок начало -->
<header class="container">
    <div class="blog-header py-3">
        <div class="col-12 text-center">
            <a class="blog-header-logo text-dark" href="{{ route('main') }}"><img src="/app/img/logo.svg" alt=""></a>
        </div>
    </div>
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route('front.news') }}">Новости</a>
            <a class="p-2 text-muted" href="{{ route('articlesList') }}">Статьи</a>
            <a class="p-2 text-muted" href="{{ route('front.shop') }}">Магазин</a>
            <a class="p-2 text-muted" href="{{ route('front.order') }}">На заказ</a>
            <a class="p-2 text-muted" href="{{ route('front.gallery') }}">Галерея</a>
            <a class="p-2 text-muted" href="{{ route('front.contacts') }}">Контакты</a>
        </nav>
    </div>
    @yield('main_block')
</header>
<!-- заголовок конец -->
    <!-- ================================================== -->
    @yield('content')
    <!-- ================================================== -->
    <!-- подвал начало -->
    <hr>
    <footer class="my-5 text-muted text-center text-small">
        <img class="mb-3" src="/app/img/logo_black.svg" alt="">
        <p class="mb-1">&copy; 2018 Берег спасения</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ route('front.news') }}">Новости</a></li>
            <li class="list-inline-item"><a href="{{ route('articlesList') }}">Статьи</a></li>
            <li class="list-inline-item"><a href="{{ route('front.shop') }}">Магазин</a></li>
            <li class="list-inline-item"><a href="{{ route('front.order') }}">На заказ</a></li>
            <li class="list-inline-item"><a href="{{ route('front.gallery') }}">Галерея</a></li>
            <li class="list-inline-item"><a href="{{ route('front.contacts') }}">Контакты</a></li>
        </ul>
        <p class="mb-1"><a href="{{ route('front.policy') }}">Политика конфиденциальности</a></p>
    </footer>
    <!-- подвал конец -->
    <!-- ================================================== -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/common.js"></script>
    @yield('js')
</body>
</html>