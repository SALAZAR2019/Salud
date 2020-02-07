<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    //
    protected $table='medicamentos';
    protected $primaryKey='clave_medicamento';

    public $timestamps=false;
    public $incrementing=false;

    public $fillable=[
    'clave_medicamento',
    'nombre',
    'fecha_caducidad',
    'tipo',
    ];
}
