<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    use HasFactory;

    protected $table = 'produto_venda';

    protected $fillable = ['produto_id', 'venda_id', 'qtd'];

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }
}
