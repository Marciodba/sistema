<?php

namespace App\Http\Controllers;

use App\Models\VpessoaGeral;
use Illuminate\Http\Request;
use App\Models\ProdutoGruposbb;
use App\Http\Controllers\padrao\IdiomaDetalhePController;
use App\Models\Pessoa;

class VpessoaGeralController extends Controller
{
    public function index(){
       
        $vpessoagerais = VpessoaGeral::where('pessoaid','>',0)->limit(50)->get();
        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->ler('vpessoageral',true);
         $mostra_coluna =  array_keys($column_aliases);
         $mostra_coluna =  implode(',',$mostra_coluna);

    $action_icons = [
           
            "icon:pencil | click:modalEdit('{pessoanome}')",
            "icon:trash | color:red | click:deleteUser({pessoaid}, '{pessoanome}', '{pessoaapelido}')",
        ];


        return view('vpessoageral/index',compact(['vpessoagerais', 'action_icons','column_aliases','mostra_coluna']));
    }

    public function edit(VpessoaGeral $cidadep, string | int $id)
    {
   

        if (!$vpessoageral = VpessoaGeral::where('pessoaid',$id)->limit(50)->get()) {
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
   

        return view('vpessoageral/edit', compact('vpessoageral','grupos'));
    }

    public function update(Request $request, string  $id)
    {
        $data = $request->all();
      
        if (!$pessoa =  Pessoa::find($id)) {
            return redirect()->back();
        }

        $pessoa->dtatualizacao = now();
     

     
        $pessoa->save();
        
      
        


       


        return redirect()->route('getCadastroPassagens');
    }
}
