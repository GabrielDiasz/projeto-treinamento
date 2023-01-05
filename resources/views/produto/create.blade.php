@extends('adminlte::page')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Produtos</h3>
        </div>
        <form class="form-horizontal mt-2" action="{{ route('produto.store') }}" method="POST">
            @include('produto.form')
        </form>
    </div>
@endsection
