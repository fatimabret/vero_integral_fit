<?php

namespace App\Repositories;

use App\Models\Usuario;
use App\Interfaces\IUsuarioRepository;

class UsuarioRepository implements IUsuarioRepository
{
    public function obtenerTodos()
    {
        return Usuario::all();
    }

    public function obtenerPorId($id)
    {
        return Usuario::findOrFail($id);
    }

    public function obtenerPorCorreo($correo)
    {
        return Usuario::where('correo', $correo)->first();
    }

    public function crear(array $datos)
    {
        return Usuario::create($datos);
    }

    public function actualizar($id, array $datos)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($datos);
        return $usuario;
    }

    public function eliminar($id)
    {
        return Usuario::destroy($id);
    }
}