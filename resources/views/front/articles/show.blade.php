@extends('layout.front')
@section('content')
    <div class="container">
            <div class="col-md-12">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-2"><a class="text-dark" href="#">{{ $articles->header }}</a></h3>
                    </div>
                </div>
                <img src="{{ asset($articles->img_path) }}" width="150" style="float: left; margin-right: 20px">
                {{ $articles->text }}
                <div class="clearfix"></div>
            </div>
    </div>
@stop