<?php

namespace App\Models\padrao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaP extends Model
{
    use HasFactory;
    protected $table = 'public.idiomap';
    public $timestamps = false;
    public $incrementing = false;
}
