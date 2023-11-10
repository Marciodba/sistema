<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpessoaUsuario extends Model
{
    use HasFactory;
    protected $table = 'public.vpessoausuario';
    public $timestamps = false;
    public $incrementing = false;

}
