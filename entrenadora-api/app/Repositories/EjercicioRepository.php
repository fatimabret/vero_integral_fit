<?php

namespace App\Repositories;

use App\Models\Ejercicio;
use App\Interfaces\IEjercicioRepository;

class EjercicioRepository implements IEjercicioRepository
{
    public function obtenerTodos() { return Ejercicio::all(); }
    public function obtenerPorId($id) { return Ejercicio::findOrFail($id); }
    public function crear(array $datos) { return Ejercicio::create($datos); }
    public function actualizar($id, array $datos) {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->update($datos);
        return $ejercicio;
    }
    public function eliminar($id) { return Ejercicio::destroy($id); }
}