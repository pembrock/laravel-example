@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Редактировать товар</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p><input type="checkbox" name="is_visibility" value="1" @if ($shop->is_visibility == 1)checked @endif autofocus> опубликовано</p>
            <p><input type="checkbox" name="is_availability" value="1" @if ($shop->is_availability == 1)checked @endif autofocus> в наличии</p>
            <p>Введите название товара:<br><input type="text" name="title" class="form-control" value="{{ $shop->title }}"></p>
            <p>Описание:<br><textarea name="description" class="form-control summernote">{!! $shop->description !!}</textarea></p>
            <p>Цена:<br><input type="text" name="price" class="form-control" value="{{ $shop->price }}"></p>
            <p>Изображение:<br><input type="file" name="image"/></p>
            @if ($shop->img)
                <div class="uploaded_image">
                    <img src="{{ asset($shop->img) }}" height="150"><br>
                    <a href="javascript:;" rel="{{ $shop->id }}" class="delete">Удалить изображение</a>
                    <br>
                    <br>
                </div>
            @endif
            <button type="submit" class="btn btn-success">Редактировать</button>
            <br>
            <br>
        </form>
    </main>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 250
            });
            $('.popover').hide();
        });
        $(function(){
            $('.delete').on('click', function(){
                if (confirm("Вы действительно хотите удалит это изображение?")) {
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "POST",
                        url: "{!! route('shop.delete.image') !!}",
                        data: {_token: "{{csrf_token()}}", id: id},
                        complete: function() {
                            alertify.success("Изображение удалено");
                            //location.reload();
                            $('.uploaded_image').hide();
                        }
                    });
                } else {
                    alertify.error("Действие отменено пользователем");
                }

                return false;
            });
        });
    </script>
@stop