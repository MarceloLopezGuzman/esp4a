<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobranza extends Model
{
    protected $table = 'cobranza';
    protected $fillable = [
        'persona_id', 'monto', 'fecha','estatus'
    ];
}
