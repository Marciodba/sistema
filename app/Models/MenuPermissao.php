<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermissao extends Model
{
    use HasFactory;
    protected $table = 'public.menupermissao';
    public $timestamps = false;
    public $incrementing = false;
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
        'dtlixo' => 'datetime:d/m/Y H:i',
        'dtagenda' => 'datetime:d/m/Y H:i',
        'dtinicio' => 'datetime:d/m/Y H:i',
        'dtfim' => 'datetime:d/m/Y H:i',
        'dtultima' => 'datetime:d/m/Y H:i',
    ];
}
