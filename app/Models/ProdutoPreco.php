<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoPreco extends Model
{
    use HasFactory;
    protected $table = 'public.produtopreco';
    public $timestamps = false;
    public $incrementing = false;
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
        'dtlixo' => 'datetime:d/m/Y H:i',
        'dtcad' => 'datetime:d/m/Y H:i',
    ];

    public function produto(){
        return $this->hasOne('App\Models\Produto', 'id', 'idproduto');
    }

}
