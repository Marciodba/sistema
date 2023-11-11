<?php

namespace App\Http\Controllers\padrao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\padrao\IdiomaDetalheP;

class IdiomaDetalhePController extends Controller
{
    public function ler($tabela, $mostra)
    {
        $IdiomaDetalhePs = IdiomaDetalheP::where('tabela',$tabela)->where('mostra',$mostra)->orderBy('ordem')->get();
        $column_aliases=[];
        foreach ($IdiomaDetalhePs  as $value){
            $column_aliases [$value->coluna] =$value->colunausa;
       } 
       
        return $column_aliases;
    }
}
