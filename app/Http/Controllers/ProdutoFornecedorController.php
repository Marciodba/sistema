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
        if (!empty($produtoFornecedorss[0]) && !empty($produtoFornecedors->pessoa)) {


            $icones = $produtoFornecedors[0]->pessoa->pluck('apelido');

            $arqFisicos = ArqFisicoCli::select(DB::RAW("encode(arqfoto, 'base64') as imagem,codnome"))->whereIn('codnome', $icones)->get();
     
            foreach ($arqFisicos as $arqFisico) {

                $img_icones[$arqFisico->codnome] = $arqFisico->imagem;
            }
        }
        return view('welcome', compact('produtoFornecedors', 'img_icones'));
    }
}
