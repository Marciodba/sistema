<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CidadeP extends Model
{
    use HasFactory;
    protected $table = 'public.cidadep';
    public $timestamps = false;
    public $incrementing = false;
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
        'dtlixo' => 'datetime:d/m/Y H:i',
    ];
}
