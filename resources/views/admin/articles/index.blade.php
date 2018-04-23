@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Список статей</h1>
        <br>
        <a href="{!! route('articles.add') !!}" class="btn btn-info">Добавить статью</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Видимость</th>
                <th>Действия</th>
            </tr>
            @foreach($articles as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->header}}</td>
                    <td>{!! $item->description !!}</td>
                    <td>{{$item->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        @if ($item->is_published == 1)
                            Опубликовано
                        @else
                            Не опубликовано
                        @endif
                    </td>
                    <td><a href="{!! route('articles.edit', ['id' => $item->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{ $item->id }}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop

@section('js')
    <script type="text/javascript">
        $(function(){
            $('.delete').on('click', function(){
                if (confirm("Вы действительно хотите удалит эту запись?")) {
                    let id = $(this).attr('rel');
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('articles.delete') !!}",
                        data: {_token: "{{csrf_token()}}", id: id},
                        complete: function() {
                            alert("Статья удалена");
                            location.reload();
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