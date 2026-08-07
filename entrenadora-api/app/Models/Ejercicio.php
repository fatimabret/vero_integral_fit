<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicio';
    protected $primaryKey = 'id_ejercicio';
    public $timestamps = false;

    protected $fillable = [
        'url',
        'descripcion',
        'titulo',
        'id_nivel'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_ejercicio', 'id_ejercicio', 'id_categoria');
    }
}