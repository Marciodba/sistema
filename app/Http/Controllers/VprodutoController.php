<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoPreco;
use Illuminate\Http\Request;
use App\Http\Controllers\padrao\IdiomaDetalhePController;
use App\Models\ProdutoGruposbb;

class VprodutoController extends Controller
{
    public function index()
    {

        $produtoprecos = ProdutoPreco::Join('produto', 'produto.id', '=', 'produtopreco.idproduto')->where('produto.id', '>', 0)->limit(50)->get();
 
        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->lerDicionario(['produto', 'produtopreco'], true);
        $mostra_coluna =  array_keys($column_aliases);
        $mostra_coluna =  implode(',', $mostra_coluna);
        $action_icons = [];

        $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{produto->nome}', '{produto->codigo}')",
            "icon:pencil | click:redirect('/produtopreco/{id}/edit')",
            "icon:trash | color:red | click:deleteProduto({id}, '{produto->nome}', '{produto->codigo}')",
        ];


        return view('produtopreco/index', compact(['produtoprecos', 'action_icons', 'column_aliases', 'mostra_coluna']));
    }

    public function edit(ProdutoPreco $cidadep, string | int $id)
    {
        if (!$produtopreco = ProdutoPreco::Join('produto', 'produto.id', '=', 'produtopreco.idproduto')->where('produto.id',  $id)->get()) {
            return redirect()->back();
        }
        $produtogruposbbs = ProdutoGruposbb::All();
        $grupos=[];
        foreach ($produtogruposbbs as $value) {
            
            $grupos[] =[ 
                'code' => $value->id,
                'codigo' => $value->codigo
            ];
     
        }
   

        return view('produtopreco/edit', compact('produtopreco','grupos'));
    }
}
