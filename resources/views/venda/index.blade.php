@extends('adminlte::page')

@section('title', 'Vendas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h1><strong>Vendas</strong></h1>
            </div>
            <div class="col sm-6">
                <a href="{{ route('venda.create') }}" class="btn btn-primary float-sm-right">
                    <i class="fas fa-user-plus"></i>
                    Cadastrar Venda
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Vendas</h3>
                </div>
                <div class="card-body">
                    @if (isset($data) && $data->isNotEmpty())
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do cliente</th>
                                <th>CPF</th>
                                <th>Valor total</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->cliente->nome }}</th>
                                    <td>{{ $item->cliente->cpf }}</td>
                                    <td>R$ {{ $item->produtos[0]->preco * $item->produtos[0]->pivot->qtd }}</td>
                                    <td>
                                        <a href="{{ route('venda.edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('venda.delete', $item->id) }}" method="POST" style="display: inline" >
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                            <i class="fas fa-archive"></i>
                                        </button>

                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Produto(s)</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($item->produtos as $product)
                                                            {{ $product->nome }}
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>
                            <h5>Não existe registro de vendas</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(isset($data) && $data->isNotEmpty())
            @if(count($data) == 1)
                <p><strong>Foi encontrado 1 registro</strong></p>
            @elseif($data->total() > $data->perPage())
                <p><strong>Exibindo {{ count($data) }} de um total de {{ $data->total() }} registros</strong></p>
            @else
                <p><strong>Foram encontrados {{ count($data) }} registros</strong></p>
            @endif
            {!! $data->appends($_GET)->links() !!}
        @endif
    </div>
@stop
