<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFornecedor extends Model
{
    use HasFactory;
    protected $table = 'public.produtofornecedor';
    public $timestamps = false;
    public $incrementing = false;

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
