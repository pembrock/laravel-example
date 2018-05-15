@extends('layout.front')
@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Заказть икону онлайн</h2>
            <p class="lead">Описание подзаголовка. Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Дал страну ее первую сбить.</p>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <div class="card">
                    <div class="card-header"><h4>Примеры</h4></div>
                    <div class="card-body">
                        <img src="{{  asset('app/img/example/diski.jpg') }}" class="img-fluid" alt="">
                        <p class="card-text">Золочение доски</p>
                        <img src="{{  asset('app/img/example/chekanka.jpg') }}" class="img-fluid" alt="">
                        <p class="card-text">Чеканка позолоты</p>
                        <img src="{{  asset('app/img/example/ornament.jpg') }}" class="img-fluid" alt="">
                        <p class="card-text">Орнаментальные поля</p>
                        <img src="{{  asset('app/img/example/raskraska.jpg') }}" class="img-fluid" alt="">
                        <p class="card-text">Раскраска чеканных полей</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                <form class="needs-validation" oninput="changeText()" novalidate>
                    <!-- Размер доски начало -->
                    <div class="card mb-3">
                        <div class="card-header"><h4>Размер доски</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-vysota">Высота, см</label>
                                    <input type="text" class="form-control" id="cc-vysota" placeholder="Введите высоту" required>
                                    <div class="invalid-feedback">
                                        Не правильная высота
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-shirina">Ширина, см</label>
                                    <input type="text" class="form-control" id="cc-shirina" placeholder="Введите ширину" required>
                                    <div class="invalid-feedback">
                                        Не верная ширина
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-area">Площадь, м<sup>2</sup></label>
                                    <input class="form-control" type="text" id="cc-area" placeholder="0" readonly>
                                    <output id="cc-area"></output>
                                    <!-- <span class="form-control-plaintext" id="cc-area">999</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Размер доски конец -->
                    <!-- Опции начало -->
                    <div class="card mb-3">
                        <div class="card-header"><h4>Опции</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zolocheniye-doski">
                                        <label class="custom-control-label" for="zolocheniye-doski">Золочение доски</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chekanka-pozoloty">
                                        <label class="custom-control-label" for="chekanka-pozoloty">Чеканка позолоты</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="raskraska-chekannykh-poley">
                                        <label class="custom-control-label" for="raskraska-chekannykh-poley">Раскраска чеканных полей</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="razdelka-odezhd-zolotom">
                                        <label class="custom-control-label" for="razdelka-odezhd-zolotom">Разделка одежд золотом</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="dopolnitel'nyy-obraz">
                                        <label class="custom-control-label" for="dopolnitel'nyy-obraz">Дополнительный образ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ornamental'nyye-polya">
                                        <label class="custom-control-label" for="ornamental'nyye-polya">Орнаментальные поля</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="arka,-tron">
                                        <label class="custom-control-label" for="arka,-tron">Арка, трон</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Количество фигур в композиции</label>
                                    <select class="custom-select d-block w-100" id="figures" required>
                                        <option value="0">нет</option>
                                        <option value="1">1 фигура</option>
                                        <option value="2">2 фигуры</option>
                                        <option value="3">3 фигуры</option>
                                        <option value="4">4 фигуры</option>
                                        <option value="5">5 фигур</option>
                                        <option value="6">6 фигур</option>
                                        <option value="7">7 фигур</option>
                                        <option value="8">8 фигур</option>
                                        <option value="9">9 фигур</option>
                                        <option value="10">10 фигур</option>
                                        <option value="11">11 фигур</option>
                                        <option value="12">12 фигур</option>
                                        <option value="13">13 фигур</option>
                                        <option value="14">14 фигур</option>
                                        <option value="15">15 фигур</option>
                                        <option value="16">16 фигур</option>
                                        <option value="17">17 фигур</option>
                                        <option value="18">18 фигур</option>
                                        <option value="19">19 фигур</option>
                                        <option value="20">20 фигур</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Выберите количество фигур
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Живописный фон (процент заполнения)</label>
                                    <select class="custom-select d-block w-100" id="background" required>
                                        <option value="0">нет</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                        <option value="40">40%</option>
                                        <option value="50">50%</option>
                                        <option value="60">60%</option>
                                        <option value="70">70%</option>
                                        <option value="80">80%</option>
                                        <option value="90">90%</option>
                                        <option value="100">100%</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Выберите процент заполнения
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Предстоящие на полях</label>
                                    <select class="custom-select d-block w-100" id="margin" required>
                                        <option value="0">нет</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Выберите количество предстоящих
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Картуш</label>
                                    <select class="custom-select d-block w-100" id="cartouche" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Выберите количество предстоящих
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Опции конец -->
                    <!-- Данные по заказу начало -->
                    <div class="card mb-3">
                        <div class="card-header"><h4>Данные по заказу</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-name">Имя</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="Введите имя" required>
                                    <div class="invalid-feedback">
                                        Введите верное имя
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-phone">Телефон</label>
                                    <input type="text" class="form-control" id="cc-phone" placeholder="Введите номер" required>
                                    <div class="invalid-feedback">
                                        Введите верный номер телефона
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-email">Электронная почта</label>
                                    <input type="text" class="form-control" id="cc-email" placeholder="Введите почту" required>
                                    <div class="invalid-feedback">
                                        Введите верный адрес электронной почты
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="cc-delivery">Способ доставки</label>
                                    <div class="custom-control custom-radio" id="cc-delivery">
                                        <input id="delivery-1" name="delivery-1" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="delivery-1">Самавывоз в офисе <a href="https://yandex.ru/maps/-/CBqyeGHyGA" target="_blank">метро Люблино, улица Судакова, дом 11</a> (<span class="text-success font-weight-bold">бесплатно</span>)</label>
                                    </div>
                                    <div class="custom-control custom-radio" id="cc-delivery">
                                        <input id="delivery-2" name="delivery-2" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="delivery-2">Курьером в пределах Москвы (<span class="text-success font-weight-bold">+150 руб</span>)</label>
                                    </div>
                                    <div class="custom-control custom-radio" id="cc-delivery">
                                        <input id="delivery-3" name="delivery-3" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="delivery-3">Транспортной компанией за пределы Москвы (<span class="text-success font-weight-bold">оплачивается отдельно</span>)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Данные по заказу конец -->
                    <!-- Итоговая цена начало -->
                    <div class="card mb-3">
                        <div class="col-md-6 mb-3">
                            <p class="h3 py-3">Итого: <span id="price" class="text-success font-weight-bold">0</span> руб.</p>
                            <button class="btn btn-primary btn-lg" type="submit">Заказать</button>
                        </div>
                    </div>
                    <!-- Итоговая цена конец -->
                </form>
            </div>
        </div>
        </div>
@stop
@section('js')
    <script type="text/javascript" src="{{ asset('app/js/calc.js') }}"></script>
@stop