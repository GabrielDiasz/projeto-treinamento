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

    <div class="d-flex justify-content-around align-items-center" >
        <div class="card rounded-lg" style="width: 18rem;">
            <img class="card-img-top" src="https://th.bing.com/th/id/R.69d82a27634be91f2e32435f8ac725df?rik=V2w2wk%2fbMiwPIw&riu=http%3a%2f%2f4.bp.blogspot.com%2f-5ndzZaZDXk8%2fUapg05Cxd6I%2fAAAAAAAABmk%2fzINtDx-uTXw%2fw1200-h630-p-k-no-nu%2fuser-icon1.jpg&ehk=%2bCkLXbxugQj21EUiIudS61er1ruvlzww5byx%2fL3ED9A%3d&risl=&pid=ImgRaw&r=0" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Área do Cliente</h5>
                <br><br>
                <a href="#" class="btn btn-primary">Clique aqui</a>
            </div>
        </div>


        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://image.freepik.com/vektoren-kostenlos/innenraum-des-modernen-lebensmittelgeschaefts-mit-produkten-die-auf-regalen-und-preisschildern-liegen-lebensmittelauswahl-im-supermarkt_198278-5181.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Área dos Produtos</h5>
                <br><br>
                <a href="#" class="btn btn-primary">Clique aqui</a>
            </div>

        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://image.freepik.com/vektoren-kostenlos/innenraum-des-modernen-lebensmittelgeschaefts-mit-produkten-die-auf-regalen-und-preisschildern-liegen-lebensmittelauswahl-im-supermarkt_198278-5181.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Área dos Produtos</h5>
                <br><br>
                <a href="#" class="btn btn-primary">Clique aqui</a>
            </div>

        </div>
    </div>

    <div class="row">
        <img class="m-auto w-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Senac_logo.svg/1200px-Senac_logo.svg.png">
    </div>
@stop
