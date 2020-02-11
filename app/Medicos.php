<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    //
    protected $table='medicos';
    protected $primaryKey='cedula';
    protected $with=['rol'];
    public $timestamps=false;
    public $incrementing=false;

    public $fillable=[
    'cedula',
    'nombre',
    'apellidop',
    'apellidom',
    'nivel_estudio',
    'id_rol'
    ];

    public function rol(){
        return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }
}
