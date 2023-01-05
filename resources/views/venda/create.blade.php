@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h1><strong>Venda</strong></h1>
            </div>
            <div class="col sm-6">
                <a href="#" class="btn btn-primary float-sm-right">
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
                    <h3 class="card-title">Lista de Usuários</h3>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-3">
                            <form>
                                <div class="form-group">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Cliente</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                                            
                                </div>

                                <div class="form-group">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Produto</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                                            
                                </div>
                                
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">

                                </div>

                            </form>
                    </div>
                </div>



                    
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
