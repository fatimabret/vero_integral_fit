<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $servicio;

    public function __construct(UsuarioService $servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->servicio->obtenerTodos(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:100|unique:usuario,correo',
            'contrasenia' => 'required|string|min:6',
            'extra' => 'required|string',
            'fecha_vencimiento' => 'required|date',
            'id_nivel' => 'required|integer|exists:nivel_membresia,id_nivel'
        ]);

        $nuevoUsuario = $this->servicio->crear($datosValidados);
        return response()->json($nuevoUsuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->servicio->obtenerPorId($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
