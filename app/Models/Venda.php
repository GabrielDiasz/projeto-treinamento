<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class)->withPivot('qtd');
    }

    public function vendaProdutos()
    {
        return $this->hasMany(VendaProduto::class);
    }
}
