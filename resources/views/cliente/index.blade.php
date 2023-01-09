@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h1><strong>Clientes</strong></h1>
            </div>

            <div class="col sm-6">
                <a href="{{ route('cliente.create') }}" class="btn btn-primary float-sm-right">
                    <i class="fas fa-user-plus"></i>
                    Cadastrar Cliente
                </a>
            </div>
        </div>
        <br>
        <div>

            @if(session()->has('message'))

                <div class="alert alert-success" id="alert">
                    <button type="button" class="close"
                    data-dismiss="alert">x</button>

                    {{session()->get('message')}}
                </div>

            @endif
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
                    @if (isset($data) && $data->isNotEmpty())
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Data de Nascimento</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->nome }}</th>
                                    <td>{{ $item->cpf }}</td>
                                    <td>{{ $item->data_nascimento}}</td>
                                    <td>
                                        <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Confirmar Exclusão </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja Excluir {{$item->nome}}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                        <form action="{{ route('cliente.delete', $item->id) }}" method="POST" style="display: inline" >
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary">Sim</button>

                                                        </form>
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
                            <h5>Não existe Registro de Clientes</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script type="text/javascript">

            $("document").ready(function()
                {
                    setTimeout(function ()
                    {
                        $("div.alert").remove();
                    },3000);
                });
        </script>
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
