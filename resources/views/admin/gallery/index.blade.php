@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Галереи</h1>
        <br>
        <a href="{!! route('gallery.add') !!}" class="btn btn-info">Добавить</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Дата добавления</th>
                <th>Видимость</th>
                <th>Действия</th>
            </tr>
            @foreach($gallery as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        @if ($item->is_visible == 1)
                            Опубликовано
                        @else
                            Не опубликовано
                        @endif
                    </td>
                    <td><a href="{!! route('gallery.edit', ['id' => $item->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{ $item->id }}">Удалить</a></td>
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
                       url: "{!! route('gallery.delete') !!}",
                       data: {_token: "{{csrf_token()}}", id: id},
                       complete: function() {
                           alert("Галлерея удалена");
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