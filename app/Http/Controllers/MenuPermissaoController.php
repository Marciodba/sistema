<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuPermissao;
use Illuminate\Support\Facades\Auth;

class MenuPermissaoController extends Controller
{
     public function ver($idmenusbb){
        $menuPermissao = MenuPermissao::where('idmenusbb',$idmenusbb)->where('idpessoa',Auth::user()->idpessoa)->first();
        $macesso ='1=1';
     
        if(!empty($menuPermissao)){
          if(substr($menuPermissao->filtropadrao, 0, 3) == 'and'){
            $macesso =substr($menuPermissao->filtropadrao, 3, strlen($menuPermissao->filtropadrao));
          }
     
          $macesso = str_replace('@@usuario',Auth::user()->email,$macesso);

        }
        

        return $macesso;
    }
}
