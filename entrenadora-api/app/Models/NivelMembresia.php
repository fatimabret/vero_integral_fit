<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelMembresia extends Model
{
    protected $table = 'nivel_membresia';
    protected $primaryKey = 'id_nivel';
    public $timestamps = false; // las fechas de creación en el script SQL
    
    protected $fillable = [
        'descripcion',
        'costo'
    ];
}