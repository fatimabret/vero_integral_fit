<?php

namespace App\Services;

use App\Interfaces\INivelMembresiaRepository;
use Exception;

class NivelMembresiaService
{
    protected $repositorio;

    // Inyectamos la interfaz, NO la implementación directa
    public function __construct(INivelMembresiaRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function obtenerTodos()
    {
        return $this->repositorio->obtenerTodos();
    }

    public function obtenerPorId($id)
    {
        return $this->repositorio->obtenerPorId($id);
    }

    public function crear(array $datos)
    {
        // Aquí en el futuro podrías agregar reglas de negocio.
        // Ej: if ($datos['costo'] < 0) throw new Exception("El costo no puede ser negativo");
        
        return $this->repositorio->crear($datos);
    }

    public function actualizar($id, array $datos)
    {
        return $this->repositorio->actualizar($id, $datos);
    }

    public function eliminar($id)
    {
        return $this->repositorio->eliminar($id);
    }
}