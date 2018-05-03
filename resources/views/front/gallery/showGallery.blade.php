@extends('layout.front')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="{{ route('front.gallery') }}">Галереи</a></h3><hr>
                <div class="card-columns p-2">
                    @if (isset($images))
                        @foreach ($images as $image)
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($image->path) }}" height="450">
                                {{--<p>{{ $gallery->title }}</p>--}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop