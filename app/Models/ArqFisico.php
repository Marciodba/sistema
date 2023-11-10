<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArqFisico extends Model
{
    use HasFactory;
    protected $table = 'midia.arqfisico';
    public $timestamps = false;
    public $incrementing = false;
}
