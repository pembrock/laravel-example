@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Редактировать новость</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p><input type="checkbox" name="is_published" value="1" @if ($news->is_published == 1)checked @endif autofocus> опубликовано</p>
            <p>Введите название новости:<br><input type="text" name="header" class="form-control" value="{{ $news->header }}"></p>
            <p>Описание:<br><textarea name="description" class="form-control summernote">{!! $news->description !!}</textarea></p>
            <p>Текст:<br><textarea name="text" class="form-control summernote">{!! $news->text !!}</textarea></p>
            <p>Изображение:<br><input type="file" name="image"/></p>
            @if ($news->img_path)
                <div class="uploaded_image">
                    <img src="{{ asset($news->img_path) }}" height="150"><br>
                    <a href="javascript:;" rel="{{ $news->id }}" class="delete">Удалить изображение</a>
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
                        url: "{!! route('news.delete.image') !!}",
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