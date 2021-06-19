<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $timestamps = false;

    protected $table = 'clientes';
 
    protected $fillable = ['id', 'nit', 'razon_social','nombre_contacto','direccion','tel_contacto','tel_empres','ciudad','email'];
 
}
