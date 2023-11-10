<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PessoaEndereco;

class PessoaEnderecoController extends Controller
{
    public function index(){

        $pessoaEnderecos = PessoaEndereco::with(['pessoa'])->limit(5)->get();

        return view('welcome',compact('pessoaEnderecos'));
    }
}
