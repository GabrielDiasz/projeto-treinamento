@extends('adminlte::page')

@section('title', 'PDV')

@section('css')
    <style>
        .total {
            font-size: 42px;
        }

        .table-overflow {
            max-height:800px;
            overflow-y:auto;
        }

        body {
            height: 100%;
            width: 100vw;
        }
    </style>
@stop

@section('content')
    <div class="row col-md-12">
        <div class="col-md-6 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Produtos</h3>
                </div>
                <div class="card-body table-overflow">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nome do produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Código de barras</th>
                        </tr>
                        </thead>
                        <tbody id="item">
                            @if(isset($venda))
                                @foreach($venda->produtos as $key => $produto)
                                    <tr>
                                        <th>{{$produto->nome}}</th>
                                        <th>R${{$produto->preco}}</th>
                                        <td>{{$venda->vendaProdutos[$key]->qtd}}</td>
                                        <td>{{$produto->codebar}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div id="total" class="col-md-12 total d-flex justify-content-center">
                @if(isset($total))
                    Total: R${{ $total }}
                @endif
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

            <div class="col-md-12 d-flex flex-row justify-content-between">
                <button class="btn btn-primary" onclick="addProduct()">
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
        let total = 0;
        let venda_id = '';

        function addProduct() {
            createsale();
            let codebar = $('input[name="codebar"]').val();
            let qtd = $('input[name="quantidade"]').val();
            $.ajax({
                url: '/pdv/listProductSale',
                type: 'GET',
                dataType: 'json',
                success: data => {
                    console.log(data);
                    // let item = `
                    //     <tr>
                    //         <th>${data.nome}</th>
                    //         <th>R$${data.preco}</th>
                    //         <td>${qtd}</td>
                    //         <td>${data.codebar}</td>
                    //     </tr>
                    // `;
                    //
                    // products = products + item;
                    // $('#item').html(products);

                    // total = total + (qtd * data.preco);
                    // $('#total').html(`Total: R$${total.toFixed(2)}`);
                }
            })
        }
        function createsale(){
            let codebar = $('input[name="codebar"]').val();
            let qtd = $('input[name="quantidade"]').val();

            if (codebar !== '' && qtd !== ''){
                $.ajax({
                    url: 'pdv/store',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        codebar: codebar,
                        qtd: qtd,
                        venda_id: venda_id,
                    },
                    success: response => {
                        venda_id = response.id
                        total = response.total
                        $('#total').html(`Total: R$${total.toFixed(2)}`)
                    }
                });
            }
        }
    </script>
@endsection
