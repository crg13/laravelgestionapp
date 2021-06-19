<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedecliente extends Model
{
    //

    public $timestamps = false;

    protected $table = 'sedes_cliente';

    protected $fillable = ['id', 'cliente_id', 'sede_lugar','direccion','ciudad'];
}
