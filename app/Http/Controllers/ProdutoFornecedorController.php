<?php

namespace App\Http\Controllers;

use App\Models\ArqFisico;
use App\Models\ArqFisicoCli;
use Illuminate\Http\Request;
use App\Models\ProdutoFornecedor;
use Illuminate\Support\Facades\DB;

class ProdutoFornecedorController extends Controller
{
    public function index()
    {

        $produtoFornecedors = ProdutoFornecedor::with(['pessoa', 'produto', 'endereco' => function ($query) {
            $query->whereNotNull(['observacao']);
        }])->where('padrao', true)->orderBy('dtatualizacao','DESC')->limit(500)->get();
        $img_icones = [];
      
        if (!empty($produtoFornecedors[0]) && !empty($produtoFornecedors[0]->pessoa)) {


            $icones = $produtoFornecedors[0]->pessoa->pluck('apelido');
            $icones_prod = $produtoFornecedors->pluck('codigo');
            $arqFisicos = ArqFisicoCli::select(DB::RAW("encode(arqfoto, 'base64') as imagem,codnome"))->whereIn('codnome', $icones)
            ->orwhereIn('codnome', $icones_prod)->get();
     
            foreach ($arqFisicos as $arqFisico) {

                $img_icones[$arqFisico->codnome] = $arqFisico->imagem;
            }
       
        }
      
        return view('welcome', compact('produtoFornecedors', 'img_icones'));
    }
}
