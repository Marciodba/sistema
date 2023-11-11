<?php

namespace App\Http\Controllers;

use App\Models\VpessoaGeral;
use Illuminate\Http\Request;
use App\Http\Controllers\padrao\IdiomaDetalhePController;

class VpessoaGeralController extends Controller
{
    public function index(){
       
        $vpessoagerais = VpessoaGeral::where('pessoaid','>',0)->limit(50)->get();
        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->ler('vpessoageral',true);
         $mostra_coluna =  array_keys($column_aliases);
         $mostra_coluna =  implode(',',$mostra_coluna);

    $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{pessoanome}', '{pessoaapelido}')",
            "icon:pencil | click:redirect('/user/{pessoaid}')",
            "icon:trash | color:red | click:deleteUser({pessoaid}, '{pessoanome}', '{pessoaapelido}')",
        ];


        return view('vpessoageral/index',compact(['vpessoagerais', 'action_icons','column_aliases','mostra_coluna']));
    }
}
