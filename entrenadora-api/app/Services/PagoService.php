<?php

namespace App\Services;

use App\Interfaces\IPagoRepository;

class PagoService
{
    protected $repositorio;

    public function __construct(IPagoRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function obtenerTodos() { return $this->repositorio->obtenerTodos(); }
    public function obtenerPorId($id) { return $this->repositorio->obtenerPorId($id); }
    
    public function crear(array $datos) { 
        // Aquí en el futuro puedes agregar lógica para actualizar 
        // automáticamente la fecha de vencimiento del usuario al registrar un pago.
        return $this->repositorio->crear($datos); 
    }
    
    public function actualizar($id, array $datos) { return $this->repositorio->actualizar($id, $datos); }
    public function eliminar($id) { return $this->repositorio->eliminar($id); }
}