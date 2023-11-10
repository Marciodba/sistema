<?php

namespace App\Http\Controllers;

use App\Models\CidadeP;
use Illuminate\Http\Request;

class CidadePController extends Controller
{
    public function index(){
       
        $cidades = CidadeP::where('id','>',0)->limit(20)->get();

        return view('cidadep/index',compact('cidades'));
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
        if (!$cidadep =  CidadeP::find($id)) {
            return redirect()->back();
        }
     
        $cidadep->delete();

        return redirect()->route('cidadeP.index');
    }

}
