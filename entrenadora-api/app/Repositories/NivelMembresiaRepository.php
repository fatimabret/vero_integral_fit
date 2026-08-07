<?php

namespace App\Repositories;

use App\Models\NivelMembresia;
use App\Interfaces\INivelMembresiaRepository;

class NivelMembresiaRepository implements INivelMembresiaRepository
{
    public function obtenerTodos()
    {
        return NivelMembresia::all();
    }

    public function obtenerPorId($id)
    {
        return NivelMembresia::findOrFail($id);
    }

    public function crear(array $datos)
    {
        return NivelMembresia::create($datos);
    }

    public function actualizar($id, array $datos)
    {
        $nivel = NivelMembresia::findOrFail($id);
        $nivel->update($datos);
        return $nivel;
    }

    public function eliminar($id)
    {
        return NivelMembresia::destroy($id);
    }
}