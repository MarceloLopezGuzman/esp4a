<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model // el lugar central de todos los bootstrapping::: Resgistrar cosas
{
    protected $table = 'informacion';
    protected $fillable = [  //te permite especificar qué campos sí quieres que se guarden en la base de datos
        'descripcion','autor' // Y se especifica en un Array
    ];
    //protected $guarded = ['id']; permite especificar qué campos no queremos que se asignen al modelo.
    //Por ejemplo el 'id' u otro campo que esta en la BD creada en la migracion 

}
