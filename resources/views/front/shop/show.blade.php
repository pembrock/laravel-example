@extends('layout.front')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="mb-2"><a class="text-dark" href="#">Магазин</a></h3><hr>
                <div class="row">
                    @foreach($shop as $item)
                    <div class="col-md-3">
                        <div class="p-2">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($item->img) }}" height="300" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{!! $item->title !!}</p>
                                    <p class="card-text">{!! $item->description !!}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-zakaz" id="make-order">Купить</button>
                                        @if ($item->is_availability == 1)
                                        <small class="text-success">В наличии</small>
                                        @else
                                        <small class="text-danger">Нет в наличии</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('#make-order').on('click', function(){
            var gid = $(this).data('id');
            $('#gid').val(gid);
        });

        $('#send-modal-order').on('click', function(){
            var gid = $('#gid').val();
            var name = $('#modalName').val();
            var phone = $('#modalPhone').val();
            var delivery = $('input[name=paymentMethod]:checked').val();
            if (name == '' || phone == '') {
                alert('Заполнены не все поля');
            } else {
                $.ajax({
                    type: "POST",
                    url: "{!! route('front.sendEmail') !!}",
                    data: {
                        _token: "{{csrf_token()}}",
                        modalOrder: 1,
                        gid: gid,
                        name: name,
                        phone: phone,
                        delivery: delivery
                    },
                    complete: function () {
                        alert("Заказ оформлен");
                        $('#gid').val(0);
                        $('#modal-zakaz').modal('hide');
                    }
                });
            }
        });
    </script>
@stop