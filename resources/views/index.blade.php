@extends('layout.front')
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-2"><a class="text-dark" href="#">Новости</a></h3>
                        <p class="card-text mb-auto"><span class="text-muted">26.03.2018 </span> <a href="#">Икона «Преподобный Савва Освященный»</a></p>
                        <p class="card-text mb-auto"><span class="text-muted">18.03.2018 </span> <a href="#">Икона «Преподобный Силуан Афонский»</a></p>
                        <p class="card-text mb-auto"><span class="text-muted">12.11.2017 </span> <a href="#">Икона «Апостолы Петр и Павел»</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-2"><a class="text-dark" href="#">Статьи</a></h3>
                        <p class="card-text mb-auto"><span class="text-muted">26.03.2018 </span> <a href="#">О видах икон</a></p>
                        <p class="card-text mb-auto"><span class="text-muted">18.03.2018 </span> <a href="#">Начало иконописи и первые гонения</a></p>
                        <p class="card-text mb-auto"><span class="text-muted">12.11.2017 </span> <a href="#">Икона «Преподобный Савва Освященный»</a></p>
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