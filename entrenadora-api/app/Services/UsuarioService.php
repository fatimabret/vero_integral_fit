<?php

namespace App\Services;

use App\Interfaces\IUsuarioRepository;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    protected $repositorio;

    public function __construct(IUsuarioRepository $repositorio)
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
        // Encriptar la contraseña antes de mandarla a la base de datos
        $datos['contrasenia'] = Hash::make($datos['contrasenia']);
        return $this->repositorio->crear($datos);
    }

    public function actualizar($id, array $datos)
    {
        // Si el cliente envía una nueva contraseña, la encriptamos. Si no, la ignoramos.
        if (isset($datos['contrasenia'])) {
            $datos['contrasenia'] = Hash::make($datos['contrasenia']);
        }
        return $this->repositorio->actualizar($id, $datos);
    }

    public function eliminar($id)
    {
        return $this->repositorio->eliminar($id);
    }
}