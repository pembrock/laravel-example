@extends('layout.front')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="#">Магазин</a></h3><hr>
                <div class="row">
                    @foreach($shop as $item)
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($item->img) }}" height="300" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{!! $item->description !!}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" dsta-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-zakaz">Купить</button>
                                        @if ($item->is_availability == 1)
                                        <small class="text-success">В наличии</small>
                                        @else
                                        <small class="text-danger">Нет в наличии</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop