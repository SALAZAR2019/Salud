<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    //
    protected $table='Equipo_Medico';
    protected $primarykey='id_material';

    public $fillable=[
    'id_material',
    'nombre',
    'unidades',
    'especializacion'

    ];
}
