<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'public.produto';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
    'id', 'codigo', 'nome', 'ativo', 'dtcad', 'idgruposbb', 'observacao',
     'estoqueminimo', 'comprarqtde', 'dtatualizacao', 'codigobarra', 'idunidade', 'codigofabricante', 'idmodelo', 'dtlixo',
      'saldototal', 'precounitario', 'tempogarantia', 'tempopreparo', 'detalhe', 'lucro', 'uid'
    ];
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
        'dtlixo' => 'datetime:d/m/Y H:i',
        'dtcad' => 'datetime:d/m/Y H:i',
      
    ];

    public function produtogruposbb(){
        return $this->hasOne('App\Models\ProdutoGruposbb', 'id', 'idgruposbb');
    }
    public function setorgruposbbproduto(){
        return $this->hasOne('App\Models\SetorGrupoSbbProduto', 'idproduto', 'id');
    }
    public function unidadep(){
        return $this->hasOne('App\Models\UnidadeP', 'id', 'idunidade');
    }
    public function modelo(){
        return $this->hasOne('App\Models\Modelo', 'id', 'idmodelo');
    }
    public function produtopreco(){
        return $this->hasOne('App\Models\ProdutoPreco', 'idproduto', 'id');
    }
}
