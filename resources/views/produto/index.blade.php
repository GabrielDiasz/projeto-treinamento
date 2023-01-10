@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h1><strong>Produtos</strong></h1>
            </div>
            <div class="col sm-6">
                <a href="{{ route('produto.create') }}" class="btn btn-primary float-sm-right">
                    <i class="fas fa-user-plus"></i>
                    Cadastrar Produto
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
                    <h3 class="card-title">Lista de Produtos</h3>
                </div>
                <div class="card-body">
                    @if (isset($data) && $data->isNotEmpty())
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->nome }}</th>
                                    <td>R${{ $item->preco }}</td>
                                    <td>{{ $item->quantidade}}</td>
                                    <td>
                                        <a href="{{ route('produto.edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('produto.delete', $item->id) }}" method="POST" style="display: inline" >
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
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
                            <h5>Não Existe Registro De Produto</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(isset($data) && $data->isNotEmpty())
            @if(count($data) == 1)
                <p><strong>Foi encontrado 1 Produto</strong></p>
            @elseif($data->total() > $data->perPage())
                <p><strong>Exibindo {{ count($data) }} de um total de {{ $data->total() }} Produto(s)</strong></p>
            @else
                <p><strong>Foram encontrados {{ count($data) }} Produtos</strong></p>
            @endif
            {!! $data->appends($_GET)->links() !!}
        @endif
    </div>
@stop

