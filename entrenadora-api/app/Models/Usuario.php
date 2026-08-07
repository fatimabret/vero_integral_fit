<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'correo',
        'contrasenia',
        'extra',
        'fecha_vencimiento',
        'id_nivel'
    ];

    // Ocultamos la contraseña para que nunca viaje en el JSON de respuesta
    protected $hidden = [
        'contrasenia',
    ];

    public function ejerciciosFavoritos()
    {
        // Un usuario pertenece a muchos ejercicios a través de la tabla intermedia
        return $this->belongsToMany(Ejercicio::class, 'ejercicio_favorito', 'id_usuario', 'id_ejercicio')
                    ->withPivot('fecha_agregado'); // Traemos el dato extra de la tabla pivot
    }
}