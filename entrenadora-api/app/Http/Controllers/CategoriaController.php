<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    protected $servicio;

    public function __construct(CategoriaService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function index() { return response()->json($this->servicio->obtenerTodos(), 200); }
    
    public function show(string $id) { return response()->json($this->servicio->obtenerPorId($id), 200); }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'descripcion' => 'required|string|max:100'
        ]);
        return response()->json($this->servicio->crear($datosValidados), 201);
    }

    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'descripcion' => 'required|string|max:100'
        ]);
        return response()->json($this->servicio->actualizar($id, $datosValidados), 200);
    }

    public function destroy(string $id)
    {
        $this->servicio->eliminar($id);
        return response()->json(['mensaje' => 'Categoría eliminada'], 200);
    }
}  