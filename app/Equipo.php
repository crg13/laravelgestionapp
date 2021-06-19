<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Equipo extends Model
{
    //otromnto
    public $timestamps = false;

    protected $table = 'equipos';


    protected $casts = [
        'otromnto' => 'array',
    ];

  /*  public function setOtromntoAttribute($value){
      $otromnto=[];

      foreach ($value as $array_item) {
        // code...
        if(!is_null($array_item['fecha'])){

          $otromnto[]= $array_item;
        }
      }



      $this->attributes['otromnto']=json_encode($otromnto);

    // dd($otromantenimiento);
 }  */ 



    protected $fillable = ['id', 'serial', 'marca','modelo','tipo_equipo','fecha_mnto','id_tecnico','contador','observaciones','otromnto','estado'];
}
