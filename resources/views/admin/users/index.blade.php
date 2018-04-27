@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Список товаров</h1>
        <br>
        <a href="{!! route('users.add') !!}" class="btn btn-info">Добавить пользователя</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Дата добавления</th>
                <th>Админ</th>
                <th>Действия</th>
            </tr>
            @foreach($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        @if ($item->isAdmin == 1)
                            Да
                        @else
                            Нет
                        @endif
                    </td>
                    <td><a href="{!! route('users.edit', ['id' => $item->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{ $item->id }}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop

@section('js')
    <script type="text/javascript">
        $(function(){
           $('.delete').on('click', function(){
               if (confirm("Вы действительно хотите удалит этого пользователя?")) {
                   let id = $(this).attr('rel');
                   $.ajax({
                       type: "DELETE",
                       url: "{!! route('users.delete') !!}",
                       data: {_token: "{{csrf_token()}}", id: id},
                       complete: function() {
                           alert("Пользователь удален");
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