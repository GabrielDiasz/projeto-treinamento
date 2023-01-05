<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //função para relacionar as tabelas do banco de dados

    public function produto(){
        return $this->belongsToMany('App\Models\Pedido');
    }

    protected $fillable = ['nome', 'cpf', 'data_nascimento'];
}
