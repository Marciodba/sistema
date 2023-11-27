<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pessoa;
use App\Models\ArqFisicoCli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PessoaController extends Controller
{


    public function index()
    {


        $clientes = Pessoa::where('ativo', true)->orderBy('dtatualizacao','DESC')->limit(500)->get();
        $img_icones = [];
      
        if (!empty($cliente)) {


            $icones = $clientes->pluck('apelido');
    
           
            $arqFisicos = ArqFisicoCli::select(DB::RAW("encode(arqfoto, 'base64') as imagem,codnome"))->whereIn('codnome', $icones)
            ->get();
     
            foreach ($arqFisicos as $arqFisico) {

                $img_icones[$arqFisico->codnome] = $arqFisico->imagem;
            }
       
        }
  
        return view('welcome', compact('clientes', 'img_icones'));
    }
    public function cadastrarUsuario()
    {
        $pessoas = Pessoa::with(['usuario'])->get();
   
        foreach ($pessoas as $pessoa) {
            if (empty($pessoa->usuario)) {
                $email =   $pessoa->apelido;
               if (!str_contains( $email, '@')) {
                    $email=$email .'@EMAIL';
                }
              
                $user = User::create([
                    'name' => $pessoa->nome,
                    'email' => $email,
                    'password' => Hash::make( $pessoa->senha),
                    'idpessoa' => $pessoa->id,

                ]);
            }
        }
    }
}
