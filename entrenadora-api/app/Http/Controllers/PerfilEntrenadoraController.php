<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PerfilEntrenadoraService;

class PerfilEntrenadoraController extends Controller
{
    protected $servicio;

    public function __construct(PerfilEntrenadoraService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function index() { return response()->json($this->servicio->obtenerTodos(), 200); }
    
    public function show(string $id) { return response()->json($this->servicio->obtenerPorId($id), 200); }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:100',
            'biografia' => 'required|string',
            'url_foto' => 'required|url|max:255',
            'instagram' => 'required|string|max:50'
        ]);
        return response()->json($this->servicio->crear($datosValidados), 201);
    }

    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'biografia' => 'sometimes|string',
            'url_foto' => 'sometimes|url|max:255',
            'instagram' => 'sometimes|string|max:50'
        ]);
        return response()->json($this->servicio->actualizar($id, $datosValidados), 200);
    }

    public function destroy(string $id)
    {
        $this->servicio->eliminar($id);
        return response()->json(['mensaje' => 'Perfil eliminado'], 200);
    }
}