<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArqFisicoCli extends Model
{
    use HasFactory;
    protected $table = 'midia.arqfisicocli';
    public $timestamps = false;
    public $incrementing = false;
}
