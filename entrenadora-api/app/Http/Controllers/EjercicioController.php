<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EjercicioService;

class EjercicioController extends Controller
{
    protected $servicio;

    public function __construct(EjercicioService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function index() { return response()->json($this->servicio->obtenerTodos(), 200); }
    
    public function show(string $id) { return response()->json($this->servicio->obtenerPorId($id), 200); }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'url' => 'required|url|max:255', // Validamos que tenga formato de enlace
            'id_nivel' => 'required|integer|exists:nivel_membresia,id_nivel'
        ]);
        return response()->json($this->servicio->crear($datosValidados), 201);
    }

    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'titulo' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string|max:100',
            'url' => 'sometimes|url|max:255',
            'id_nivel' => 'sometimes|integer|exists:nivel_membresia,id_nivel'
        ]);
        return response()->json($this->servicio->actualizar($id, $datosValidados), 200);
    }

    public function destroy(string $id)
    {
        $this->servicio->eliminar($id);
        return response()->json(['mensaje' => 'Ejercicio eliminado'], 200);
    }
}