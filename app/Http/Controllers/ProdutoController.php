<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //

    public function cadastraProduto($codigo,$nome){
        $produto = Produto::firstOrNew(['codigo' => $codigo]);
 

            $produto->nome=$nome;
            $produto->ativo =  'true';
            $produto->dtcad = now();
            $produto->idgruposbb= '1';
            $produto->observacao=  'cadastro via site';
            $produto->estoqueminimo =  '0';
            $produto->comprarqtde=  '1';
            $produto->dtatualizacao=  now();
        
            $produto->idunidade=  '1';
            $produto->codigofabricante=  $codigo;
            $produto->idmodelo=  '1';
            $produto->saldototal=  '0';
            $produto->precounitario=  '0';
            $produto->tempogarantia=  '01:00:00';
            $produto->tempopreparo=  '01:00:00';
            $produto->detalhe=  'laravel';
            $produto->lucro= '0';
     
          
        $produto->save();
        return $produto;
    }
}
