@csrf

@if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}">
@endif

<div class="container">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($data) ? $data->nome : '' }}" autocomplete="name" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="codebar" class="col-md-4 col-form-label text-md-right">Codebar:</label>
        <div class="col-md-6">
            <input id="codebar" type="text" class="form-control @error('codebar') is-invalid @enderror" name="codebar" value="{{ isset($data) ? $data->codebar : '' }}" autocomplete="codebar" required autofocus>
            @error('codebar')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="preco" class="col-md-4 col-form-label text-md-right">Preço:</label>
        <div class="col-md-6">
            <input id="preco" type="number" class="form-control preco @error('preco') is-invalid @enderror" name="preco" value="{{ isset($data) ? $data->preco : '' }}" autocomplete="preco" required autofocus>
            @error('preco')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade:</label>
        <div class="col-md-6">
            <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" autocomplete="quantidade" value="{{ isset($data) ? $data->quantidade : '' }}" required autofocus >
            @error('quantidade')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-2">
        <div class="col-md-6 offset-md-4  ">
            <button type="submit" class="btn btn-primary float-right mr-2">
                Salvar
            </button>
        </div>
    </div>
</div>
