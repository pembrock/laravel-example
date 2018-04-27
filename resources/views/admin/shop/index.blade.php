@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Список товаров</h1>
        <br>
        <a href="{!! route('shop.add') !!}" class="btn btn-info">Добавить товар</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Дата добавления</th>
                <th>В наличии</th>
                <th>Опубликовано</th>
                <th>Действия</th>
            </tr>
            @foreach($shop as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{!! $item->description !!}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{$item->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        @if ($item->is_availability == 1)
                            В наличии
                        @else
                            Нет в наличии
                        @endif
                    </td>
                    <td>
                        @if ($item->is_visibility == 1)
                            Опубликовано
                        @else
                            Не опубликовано
                        @endif
                    </td>
                    <td><a href="{!! route('shop.edit', ['id' => $item->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{ $item->id }}">Удалить</a></td>
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
                       url: "{!! route('shop.delete') !!}",
                       data: {_token: "{{csrf_token()}}", id: id},
                       complete: function() {
                           alert("Товар удален");
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