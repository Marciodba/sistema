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
        $macesso ='1=1';
     
        if(!empty($menuSbbConfig)){
          if(substr($menuSbbConfig->clausulawhere, 0, 3) == 'and'){
            $macesso =substr($menuSbbConfig->clausulawhere, 3, strlen($menuSbbConfig->clausulawhere));
          }
     
          $macesso = str_replace('@@usuario',Auth::user()->email,$macesso);

        }

        return $macesso;
    }
}
