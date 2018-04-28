@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1>Редактировать</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Текст:<br><textarea name="text" class="form-control summernote">{!! $data->text !!}</textarea></p>
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
    </script>
@stop