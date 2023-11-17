<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSbbConfig;
use Illuminate\Support\Facades\Auth;

class MenuSbbConfigController extends Controller
{
    //

    public function ver($idmenusbb){
        $menuSbbConfig = MenuSbbConfig::where('idmenusbb',$idmenusbb)->where('idpessoa',Auth::user()->idpessoa)->first();
        $macesso =null;
     
        if(!empty($menuSbbConfig)){
         
          $macesso = str_replace($menuSbbConfig->clausulawhere,'@@usuario',Auth::user()->email);

        }
      
        return $macesso;
    }
}
