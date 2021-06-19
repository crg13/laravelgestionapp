<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedeinstalacion extends Model
{
    public $timestamps = false;

    protected $table = 'sedes_instalacion';

    protected $fillable = ['id', 'equipo_id', 'sedeCliente_id','ubicacion','ciudad','fecha_instalacion'];
}
