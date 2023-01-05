<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'preco', 'quantidade'];

    //função para relacionar as tabelas do banco de dados

    public function vendas(){
        return $this->belongsToMany(Venda::class);
    }
}
