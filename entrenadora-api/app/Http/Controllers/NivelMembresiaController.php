<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NivelMembresiaService;

class NivelMembresiaController extends Controller
{
    protected $servicio;

    // <-- Agregar el tipo exacto de la clase aquí
    public function __construct(NivelMembresiaService $servicio) 
    {
        $this->servicio = $servicio;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = $this->servicio->obtenerTodos();
        return response()->json($niveles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos que el JSON que envía React traiga los datos correctos
        $datosValidados = $request->validate([
            'descripcion' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0.01'
        ]);

        $nuevoNivel = $this->servicio->crear($datosValidados);
        return response()->json($nuevoNivel, 201); // 201 = Creado
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nivel = $this->servicio->obtenerPorId($id);
        return response()->json($nivel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'descripcion' => 'sometimes|string|max:50',
            'costo' => 'sometimes|numeric|min:0.01'
        ]);

        $nivelActualizado = $this->servicio->actualizar($id, $datosValidados);
        return response()->json($nivelActualizado, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->servicio->eliminar($id);
        return response()->json(['mensaje' => 'Nivel de membresía eliminado'], 200);
    }
    
}
