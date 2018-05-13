@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Редактировать галерею</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p><input type="checkbox" name="is_visible" value="1" @if ($gallery->is_visible == 1)checked @endif> опубликовано</p>
            <p>Введите название:<br><input type="text" name="title" class="form-control" value="{{ $gallery->title }}"></p>

            <p>Добавить изображения (можно выбрать несколько):
                <br><br>
                <input type="file" name="images[]" multiple class="form-control">
            </p>

            <button type="submit" class="btn btn-success">Редактировать</button>
            <br>
            <br>
            @if (isset($images))
                <p>Загруженные изображения:</p>
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card-columns p-2">
                                @foreach ($images as $image)
                                <div >
                                    <img src="{{ asset($image->path) }}" alt="Card image cap" style="width: 60%; height: 180px; margin: 5px;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </main>
@stop