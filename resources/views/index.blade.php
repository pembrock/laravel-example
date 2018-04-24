@extends('layout.front')
@section('main_block')
    <div class="jumbotron p-3 p-md-5 rounded">
        <div class="col-md-12">
            <h1 class="display-4 font-italic"><span class="opacity">Иконная мастерская</span></h1>
            <p class="lead my-3">Добро пожаловать! Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Образ страну маленький парадигматическая которое вопрос дал деревни рыбными языкового..</p>
            <img src="/app/img/header.jpg" class="img-fluid" alt="">
            {{--<p class="lead mb-0"><a href="#" class="font-weight-bold">подробнее...</a></p>--}}
        </div>
    </div>
@stop
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-2"><a class="text-dark" href="#">Новости</a></h3>
                        @foreach($newsItems as $news )
                        <p class="card-text mb-auto"><span class="text-muted">{{ $news->created_at->format('d.m.Y') }} </span> <a href="{{ route('front.news.show', $news->id) }}">{{ $news->header }}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-2"><a class="text-dark" href="#">Статьи</a></h3>
                        @foreach($articlesItems as $article)
                        <p class="card-text mb-auto"><span class="text-muted">{{ $article->created_at->format('d.m.Y') }} </span> <a href="{{ route('front.articles.show', $article->id) }}">{{ $article->header }}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="#">Магазин</a></h3><hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Описание иконы. Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-zakaz">Купить</button>
                                        <small class="text-success">В наличии</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Описание иконы. Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-zakaz">Купить</button>
                                        <small class="text-success">В наличии</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Описание иконы. Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-zakaz" disabled>Купить</button>
                                        <small class="text-danger">Нет в наличии</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Описание иконы. Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-zakaz">Купить</button>
                                        <small class="text-success">В наличии</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="#">Галерея</a></h3><hr>
                <div class="card-columns p-2">
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-1.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-3.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-3.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-1.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-2.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-3.jpg" alt="Card image cap">
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="/app/img/icon-3.jpg" alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop