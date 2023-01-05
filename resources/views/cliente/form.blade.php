
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
        <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF:</label>
        <div class="col-md-6">
            <input id="cpf" type="text" class="form-control cpf @error('cpf') is-invalid @enderror" name="cpf" value="{{ isset($data) ? $data->cpf : '' }}" autocomplete="cpf" required autofocus>
            @error('cpf')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="date" class="col-md-4 col-form-label text-md-right">Data de Nascimento:</label>
        <div class="col-md-6">
            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="date" value="{{ isset($data) ? $data->data_nascimento : '' }}" required autofocus >
            @error('date')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div id="newPhone"></div>

    <div class="form-group row mb-2">
        <div class="col-md-6 offset-md-4  ">
            <button type="submit" class="btn btn-primary float-right mr-2">
                Salvar
            </button>
        </div>
    </div>
</div>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function (){
            $('.cpf').mask('000.000.000-00')
        })
        function addPhone() {
            let elementCloned = $(`#phone0`).clone();
            elementCloned[0].children[1].children[0].setAttribute('readonly', true)
            $('#newPhone').append(elementCloned);
            $('#phone').val('');
        }
    </script>
@stop
