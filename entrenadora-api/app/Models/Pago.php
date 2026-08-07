<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'id_pago';
    public $timestamps = false;

    protected $fillable = [
        'monto',
        'fecha_pago',
        'metodo_pago',
        'comprobante',
        'id_usuario'
    ];
}