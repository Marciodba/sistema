<?php

namespace App\Http\Controllers;

use App\Models\ArqFisico;
use Illuminate\Http\Request;
use App\Models\VpessoaUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VpessoaUsuarioController extends Controller
{
    //
    public function index(VpessoaUsuario $vpessoaUsuario){

        $vpessoaUsuarios = $vpessoaUsuario->where('apelido',Auth::user()->email)->get();
       
       $icones = $vpessoaUsuarios->pluck('icone');
      
        $arqFisicos = ArqFisico::select(DB::RAW("encode(arqfoto, 'base64') as imagem,codnome"))->whereIn('codnome', $icones)->get();
        $img_icones=[];
        foreach ($arqFisicos as $arqFisico) {
      
            $img_icones[$arqFisico->codnome] = $arqFisico->imagem;
        }
    
        return view('dashboard',compact('vpessoaUsuarios','img_icones'));
    }
}
