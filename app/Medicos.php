<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    //
    protected $table='medicos';
    protected $primaryKey='cedula';
    public $timestamps=false;
    public $incrementing=false;

    public $fillable=[
    'cedula',
    'nombre',
    'apellidop',
    'apellidom',
    'nivel_estudio',
    ];
}
