<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoFornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'public.produtofornecedor';
    public $timestamps = false;
    public $incrementing = false;

    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
    ];

    public function produto(){
        return $this->hasOne('App\Models\Produto', 'id', 'idproduto');
    }
    public function pessoa(){
        return $this->hasOne('App\Models\Pessoa', 'id', 'idpessoa');
    }
    public function endereco(){
        return $this->hasOne('App\Models\PessoaEndereco', 'idpessoa', 'idpessoa');
    }
}
