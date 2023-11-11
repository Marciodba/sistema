<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PessoaController extends Controller
{
    public function cadastrarUsuario()
    {
        $pessoas = Pessoa::with(['usuario'])->get();
        foreach ($pessoas as $pessoa) {
            if (empty($pessoa->usuario)) {
                    

                $user = User::create([
                    'name' => $pessoa->nome,
                    'email' => $pessoa->apelido,
                    'password' => Hash::make( $pessoa->senha),
                ]);
            }
        }
    }
}
