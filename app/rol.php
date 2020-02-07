<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    //
    protected $table='roles';
    protected $primaryKey='id_rol';

   
    // public $timestamps=false;
    // public $incrementing=false;

    //lo que se llenara por el usuario
    public $fillable=[
    'id_rol',
    'rol',

    ];
}
