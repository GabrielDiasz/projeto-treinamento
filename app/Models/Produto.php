<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //função para relacionar as tabelas do banco de dados

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido','App\Models\Venda');
    }
}
