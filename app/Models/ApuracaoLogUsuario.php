<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApuracaoLogUsuario extends Model
{
    use HasFactory;
    protected $table = 'public.apuracaologusuario';
    public $timestamps = false;
    public $incrementing = false;
}
