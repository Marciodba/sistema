<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CidadeP extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'public.cidadep';
    public $timestamps = false;
    public $incrementing = false;
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
        'dtlixo' => 'datetime:d/m/Y H:i',
    ];
}
