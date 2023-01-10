@extends('adminlte::page')

@section('title', 'PDV')

@section('css')
    <style>
        .total {
            font-size: 42px;
        }
    </style>
@stop

@section('content')
    <div class="row col-md-12">

        <div class="col-md-6" id="itens">
            <div></div>
            <div id="itens"></div>
        </div>

        <div class="col-md-6 d-flex flex-column">
            <div class="col-md-12 total d-flex justify-content-center">
                Total: R$ 500
            </div>

            <div class="col-md-12 d-flex flex-row ">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="codebar">Código de barras:</label>
                        <input class="form-control" type="text" name="codebar" id="codebar">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input class="form-control" type="number" name="quantidade" id="quantidade">
                    </div>
                </div>
            </div>

            <div class="col-md-12 d-flex flex-row">
                <button class="btn btn-primary" onclick="addproduct()">
                    Enviar Produto
                </button>

                <button class="btn btn-primary">
                    Finalizar Venda
                </button>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        let products = '';
        function addproduct() {
            let codebar = $('input[name="codebar"]').val();
            let qtd = $('input[name="quantidade"]').val();
            $.ajax({
                url: '/produto/find/' + codebar,
                type: 'GET',
                dataType: 'json',
                success:function (data) {
                    // console.log(data)
                    let item = '<p> id' + data.id + '-' + data.nome + '-' + qtd + '</p>';
                    products = products + item;
                    $('#itens').html(products);
                }

            })
            console.log(products)
        }
    </script>
@endsection
