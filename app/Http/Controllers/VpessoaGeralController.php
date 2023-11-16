<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\VpessoaGeral;
use Illuminate\Http\Request;
use App\Models\ProdutoGruposbb;
use App\Http\Requests\PessoaRequest;
use App\Http\Controllers\padrao\IdiomaDetalhePController;

class VpessoaGeralController extends Controller
{
    public function index(){
       
        $vpessoagerais = VpessoaGeral::where('pessoaid','>',0)->limit(50)->orderBy('pessoadtatualizacao','DESC')->get();
        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->ler('vpessoageral',true);
         $mostra_coluna =  array_keys($column_aliases);
       
         $altera_coluna =  implode("}','{",$mostra_coluna);
            $altera_coluna ="'{pessoaid}','{pessoaobservacao}','{pessoaobservacao1}','{" .$altera_coluna."}'";
            //

         $mostra_coluna =  implode(',',$mostra_coluna);

   

    $action_icons = [
           
            "icon:pencil | click:formmode($altera_coluna)",
            "icon:trash | color:red | click:deleteUser({pessoaid}, '{pessoanome}', '{pessoaapelido}')",
        ];


        return view('vpessoageral/index',compact(['vpessoagerais', 'action_icons','column_aliases','mostra_coluna']));
    }

    public function edit(VpessoaGeral $cidadep, string | int $id)
    {
   

        if (!$vpessoageral = VpessoaGeral::where('pessoaid',$id)->limit(50)->get()) {
            return redirect()->back();
        }
  /*      $produtogruposbbs = ProdutoGruposbb::All();
        $grupos=[];
        foreach ($produtogruposbbs as $value) {
            
            $grupos[] =[ 
                'code' => $value->id,
                'codigo' => $value->codigo
            ];
     
        }
   */

        $grupos = [
            [ 'label' => 'Benin',         'value' => 'bj' ],
            [ 'label' => 'Burkina Faso',  'value' => 'bf' ],
            [ 'label' => 'Ghana',         'value' => 'gh' ],
            [ 'label' => 'Nigeria',       'value' => 'ng' ],
            [ 'label' => 'Kenya',         'value' => 'ke' ]
        ];
        return view('vpessoageral/edit', compact('vpessoageral','grupos'));
    }

    public function update(Request $request)
    {   
   
       

        $data = $request->all();

        if (!$pessoa =  Pessoa::find($data['pessoaid'])) {
            return redirect()->back();
        }
        $pessoa->apelido = $data['pessoaapelido'];
        $pessoa->nome = $data['pessoanome'];
        $pessoa->observacao = $data['pessoaobservacao'];
        $pessoa->observacao1 = $data['pessoaobservacao1'];
        $pessoa->dtatualizacao = now();

        if(!empty($data['pessoaativo'])){
          
            $pessoa->ativo = $data['pessoaativo'];
        }else{
            $pessoa->ativo = false;
        }
    
        $pessoa->dtlixo = $data['pessoadtlixo'];
     

     
        $pessoa->save();
        

        return redirect()->route('getPessoaGeral');
    }
}
