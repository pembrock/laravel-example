@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Список категорий</h1>
        <br>
        <a href="{!! route('categories.add') !!}" class="btn btn-info">Добавить категорию</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{!! $category->description !!}</td>
                    <td>{{$category->created_at->format('d-m-Y H:i')}}</td>
                    <td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete">Удалить</a></td>
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
                       url: "{!! route('categories.delete') !!}",
                       data: {_token: "{{csrf_token()}}", id: id},
                       complete: function() {
                           alert("Категория удалена");
                           location.reload();
                       }
                   });
               } else {
                   alertify.error("Дествие отменено пользователем");
               }

               return false;
           });
        });
    </script>
@stop