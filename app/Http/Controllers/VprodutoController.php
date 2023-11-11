<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoPreco;
use Illuminate\Http\Request;
use App\Http\Controllers\padrao\IdiomaDetalhePController;

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
            "icon:pencil | click:redirect('/user/{produto.id}')",
            "icon:trash | color:red | click:deleteUser({produto.id}, '{produto->nome}', '{produto->codigo}')",
        ];


        return view('produtopreco/index', compact(['produtoprecos', 'action_icons', 'column_aliases', 'mostra_coluna']));
    }
}
