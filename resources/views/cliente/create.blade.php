@extends('adminlte::page')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Clientes</h3>
        </div>
        <form class="form-horizontal mt-2" action="{{ route('cliente.store') }}" method="POST">
            @include('cliente.form')
        </form>
    </div>
@endsection
