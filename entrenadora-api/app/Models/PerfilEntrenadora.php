<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilEntrenadora extends Model
{
    protected $table = 'perfil_entrenadora';
    protected $primaryKey = 'id_perfil';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'biografia',
        'url_foto',
        'instagram'
    ];
}