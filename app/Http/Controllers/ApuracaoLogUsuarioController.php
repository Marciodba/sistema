<?php

namespace App\Http\Controllers;


use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Models\ApuracaoLogUsuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ApuracaoLogUsuarioController extends Controller
{
    //


    public function salvar($entrada, $loguser)
    {
        $pessoa =  Pessoa::where('apelido', Auth::user()->email)->orWhere('idpessoa', Auth::user()->idpessoa)->first();
       
        if (empty(Auth::user()->idpessoa)) {
            $user = User::where('id', Auth::user()->id)->first();
   
            $user->idpessoa = $pessoa->id;
            $user->save();
        }
        
        $apuracaoLogUsuario = new ApuracaoLogUsuario;

        $apuracaoLogUsuario->acao = $entrada;
        $apuracaoLogUsuario->stringserial = $entrada . ' ' . $loguser .' '. Auth::user()->email;
        $apuracaoLogUsuario->stringserialnovo = $entrada . ' ' . $loguser .' '. Auth::user()->email;
        $apuracaoLogUsuario->bean = 'PRINCIPAL';
        $apuracaoLogUsuario->descricao = 'CONTROLE DE ENTRADA E SAIDA ';
        $apuracaoLogUsuario->dtlog = now();
        $apuracaoLogUsuario->dtatualizacao = now();
        $apuracaoLogUsuario->idpessoa = $pessoa->id;

        $apuracaoLogUsuario->save();
    }
}
