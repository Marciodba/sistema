<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoGrupo extends Model
{
    use HasFactory;
    protected $table = 'public.produtogrupo';
    public $timestamps = false;
    public $incrementing = false;
}
