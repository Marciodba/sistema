<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpessoaGeral extends Model
{
    use HasFactory;
    protected $table = 'public.vpessoageral';
    public $timestamps = false;
    public $incrementing = false;

    protected $casts = [
        'pessoadtatualizacao' => 'datetime:d/m/Y H:i',
        'pessoadtcad' => 'datetime:d/m/Y H:i',
        'pessoaddtlixo' => 'datetime:d/m/Y',

    ];


  
    public function confirmado()
    {
        if ( $this->pessoaativo == 1 ){
            return "Ativo";
        }else{
            return "Inativo";
        }

    }
    

  
}
