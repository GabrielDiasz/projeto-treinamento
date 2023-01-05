<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'data_nascimento'];

    //função para relacionar as tabelas do banco de dados

    public function vendas(){
        return $this->hasMany(Venda::class);
    }
}
