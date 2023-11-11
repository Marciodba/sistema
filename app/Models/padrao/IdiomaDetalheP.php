<?php

namespace App\Models\padrao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDetalheP extends Model
{
    use HasFactory;
    protected $table = 'public.idiomadetalhep';
    public $timestamps = false;
    public $incrementing = false;
}
