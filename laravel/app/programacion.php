<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    protected $table = 'programacion';
    protected $fillable = [
        'lenguaje', 'descripcion','imagen','url','autor'
    ];
}
