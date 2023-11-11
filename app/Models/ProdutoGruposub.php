<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoGruposub extends Model
{
    use HasFactory;
    protected $table = 'public.produtogruposub';
    public $timestamps = false;
    public $incrementing = false;
}
