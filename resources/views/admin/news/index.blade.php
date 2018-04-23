@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Список новостей</h1>
        <br>
        <a href="{!! route('news.add') !!}" class="btn btn-info">Добавить новость</a>
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
            @foreach($news as $item)
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
                    <td><a href="{!! route('news.edit', ['id' => $item->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{ $item->id }}">Удалить</a></td>
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
                       url: "{!! route('news.delete') !!}",
                       data: {_token: "{{csrf_token()}}", id: id},
                       complete: function() {
                           alert("Новость удалена");
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