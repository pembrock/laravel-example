@extends('layout.front')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="#">Галерея</a></h3><hr>
                <div class="card-columns p-2">
                    @if (isset($galleries))
                        @foreach ($galleries as $gallery)
                            <div class="card">
                                <a href="{{ route('front.gallery.show', ['id' => $gallery->id]) }}"><img class="card-img-top" src="{{ asset($preview[$gallery->id]) }}" alt="{{ $gallery->title }}" height="450"></a>
                                {{--<p>{{ $gallery->title }}</p>--}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop