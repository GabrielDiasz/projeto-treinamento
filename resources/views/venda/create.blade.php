@extends('adminlte::page')

@section('title', 'Cadastrar venda')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Vendas</h3>
        </div>
        <div class="container m-2">
            <form class="form-horizontal mt-2" action="{{ route('venda.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <select class="form-select" aria-label="Cliente">
                        <option selected>Clientes</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row" id="product">
                    <div class="form-group">
                        <div class="flex-row">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Produtos</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>

                            <label for="qtd">Quantidade:</label>
                            <input name="qtd" type="number" id="qtd" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>

                <div id="newProduct"></div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary float-right">
                        Salvar
                    </button>
                    <button onclick="addProduct()" type="button" class="btn btn-primary">
                        Adicionar produto
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function addProduct() {
            let elementCloned = $(`#product`).clone();
            $('#newProduct').append(elementCloned);
        }
    </script>
@stop
