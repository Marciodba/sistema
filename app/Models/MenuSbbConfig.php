<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSbbConfig extends Model
{
    use HasFactory;
    protected $table = 'public.menusbbconfig';
    public $timestamps = false;
    public $incrementing = false;
    protected $casts = [
        'dtatualizacao' => 'datetime:d/m/Y H:i',
    ];
}
