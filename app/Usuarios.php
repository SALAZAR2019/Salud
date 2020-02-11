<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
    protected $table='usuarios';
    protected $with=['rol'];
    protected $primaryKey='clave_usuario';

   
    public $timestamps=false;
    public $incrementing=false;

    //lo que se llenara por el usuario
    public $fillable=[
    'clave_usuario',
    'nombre',
    'apellidop',
    'apellidom',
    'user',
    'contraseña',
    'foto',
    'id_rol',

    ];

    public function rol(){
    	return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }
}
