@extends('adminlte::page')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Produto</h3>
        </div>
        <form class="form-horizontal mt-2" action="{{ route('produto.update') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('produto.form')
        </form>
    </div>
@endsection
