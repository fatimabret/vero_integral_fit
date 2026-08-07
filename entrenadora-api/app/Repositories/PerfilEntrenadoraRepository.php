<?php

namespace App\Repositories;

use App\Models\PerfilEntrenadora;
use App\Interfaces\IPerfilEntrenadoraRepository;

class PerfilEntrenadoraRepository implements IPerfilEntrenadoraRepository
{
    public function obtenerTodos() { return PerfilEntrenadora::all(); }
    public function obtenerPorId($id) { return PerfilEntrenadora::findOrFail($id); }
    public function crear(array $datos) { return PerfilEntrenadora::create($datos); }
    public function actualizar($id, array $datos) {
        $perfil = PerfilEntrenadora::findOrFail($id);
        $perfil->update($datos);
        return $perfil;
    }
    public function eliminar($id) { return PerfilEntrenadora::destroy($id); }
}