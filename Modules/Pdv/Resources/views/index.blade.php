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

        <div class="col-md-6">

        </div>

        <div class="col-md-6 d-flex flex-column">
            <div class="col-md-12 total d-flex justify-content-center">
                Total: R$ 500
            </div>

            <div class="col-md-12 d-flex flex-row ">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="barcode">Código de barras:</label>
                        <input class="form-control" type="text" name="barcode" id="barcode">
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
                <button class="btn btn-primary">
                    Enviar Produto
                </button>

                <button class="btn btn-primary">
                    Finalizar Venda
                </button>
            </div>
        </div>

    </div>
@stop
