<?php

namespace App\Repositories;

use App\Models\Pago;
use App\Interfaces\IPagoRepository;

class PagoRepository implements IPagoRepository
{
    public function obtenerTodos() { return Pago::all(); }
    public function obtenerPorId($id) { return Pago::findOrFail($id); }
    public function crear(array $datos) { return Pago::create($datos); }
    public function actualizar($id, array $datos) {
        $pago = Pago::findOrFail($id);
        $pago->update($datos);
        return $pago;
    }
    public function eliminar($id) { return Pago::destroy($id); }
}