<?php

namespace App\Http\Controllers;

use App\Models\VpessoaGeral;
use Illuminate\Http\Request;

class VpessoaGeralController extends Controller
{
    public function index(){
       
        $vpessoagerais = VpessoaGeral::where('pessoaid','>',0)->limit(50)->get();
      //  $cidades=[];
      //  foreach ($cidadeps as $value){
      //      $cidades[$value->id] = $value->nome; 
     //       $cidades[$value->id] = $value->uf; 
     //   }

     //   $cidades = collect($cidades);

    $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{pessoanome}', '{pessoaapelido}')",
            "icon:pencil | click:redirect('/user/{pessoaid}')",
            "icon:trash | color:red | click:deleteUser({pessoaid}, '{pessoanome}', '{pessoaapelido}')",
        ];


        return view('vpessoageral/index',compact(['vpessoagerais', 'action_icons']));
    }
}
