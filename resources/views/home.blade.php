@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Página Inicial</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0">{{ $message }}</h3>
                    <h4>Seja bem vindo!</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <img class="m-auto w-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Senac_logo.svg/1200px-Senac_logo.svg.png">
    </div>
@stop
