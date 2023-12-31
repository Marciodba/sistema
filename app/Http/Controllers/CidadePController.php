<?php

namespace App\Http\Controllers;

use App\Http\Controllers\padrao\IdiomaDetalhePController;
use App\Models\CidadeP;
use Illuminate\Http\Request;

class CidadePController extends Controller
{
    public function index($functionid,$titulo,$inclui,$edita,$deleta){
       
        $cidades = CidadeP::where('id','>',0)->limit(50)->get();
      //  $cidades=[];
      //  foreach ($cidadeps as $value){
      //      $cidades[$value->id] = $value->nome; 
     //       $cidades[$value->id] = $value->uf; 
     //   }

     //   $cidades = collect($cidades);
     $idiomaDetalhePController = new IdiomaDetalhePController;
     $column_aliases = $idiomaDetalhePController->ler('cidadep',true);
      $mostra_coluna =  array_keys($column_aliases);
      $mostra_coluna =  implode(',',$mostra_coluna);


    $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{nome}', '{uf}')",
            "icon:trash | color:red | click:destroy({id},'{nome}')",
        ];


        return view('cidadep/index',compact(['action_icons','cidades','column_aliases','mostra_coluna'
    ,'titulo','inclui','edita','deleta']));
    }

    public function filtro(){
      
        $cidades = CidadeP::where('id','>',0)->limit(5)->get();
      //  $cidades=[];
      //  foreach ($cidadeps as $value){
      //      $cidades[$value->id] = $value->nome; 
     //       $cidades[$value->id] = $value->uf; 
     //   }

     //   $cidades = collect($cidades);
     $idiomaDetalhePController = new IdiomaDetalhePController;
     $column_aliases = $idiomaDetalhePController->ler('cidadep',true);
      $mostra_coluna =  array_keys($column_aliases);
      $mostra_coluna =  implode(',',$mostra_coluna);


    $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{nome}', '{uf}')",
            "icon:trash | color:red | click:destroy({id},{nome})",
        ];


        return view('cidadep/index',compact(['action_icons','cidades','column_aliases','mostra_coluna'
    ,'titulo','inclui','edita','deleta']));
    }

    public function show(string | int $id)
    {
        if (!$cidadep =  CidadeP::find($id)) {
            return redirect()->back();
        }
        return view('cidadep/show', compact('cidadep'));
    }
    public function create()
    {
        $cidade = CidadeP::all();
        return view('cidadep/create', compact('cidade'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $cidadep = new CidadeP;

        $cidadep->save();

        return redirect()->route('cidadep.index');
        //teste
    }

    public function edit(CidadeP $cidadep, string | int $id)
    {
        if (!$cidadep =  CidadeP::with(['condutor', 'fotosVeiculo'])->find($id)) {
            return redirect()->back();
        }



        return view('cidadep/edit', compact('cidadep'));
    }
    public function update(Request $request, CidadeP $cidadep, string  $id)
    {
        $data = $request->all();
        if (!$cidadep =  $cidadep->find($id)) {
            return redirect()->back();
        }
   
      


        $cidadep->save();
       


        return redirect()->route('cidadep.index');
    }

    public function destroy(string | int $id)
    {

        dd('aqui', $id);
        if (!$cidadep =  CidadeP::find($id)) {
            return redirect()->back();
        }
     
        $cidadep->delete();

        return redirect()->route('cidadeP.index');
    }

    public function pesquisa($p_nome){

        $cidades = CidadeP::where('nome','ilike',"%" .$p_nome. "%" )->limit(10)->get();

        return view('cidadep/index',compact('cidades'));
    }

}
