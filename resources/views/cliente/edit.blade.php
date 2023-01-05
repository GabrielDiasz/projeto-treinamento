@extends('adminlte::page')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Cliente</h3>
        </div>
        <form class="form-horizontal mt-2" action="{{ route('cliente.update') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('cliente.form')
        </form>
    </div>
@endsection


