<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'public.pessoa';
    public $timestamps = false;
    public $incrementing = false;

    public function usuario(){
        return $this->hasOne('App\Models\User', 'email', 'apelido');
    }


}
